<?php

require "../models/jet.php";
class restJet
{
    public function __construct()
    {
    }

    public function processRequest(string $method, ?string $id): void
    {
        if ($id) {

            $this->processResourceRequest($method, $id);

        } else {

            $this->processCollectionRequest($method);

        }
    }

    private function processResourceRequest(string $method, string $id): void
    {
        $jet = getJet($id);

        if ( ! $jet) {
            http_response_code(404);
            echo json_encode(["message" => "Jet not found"]);
            return;
        }

        switch ($method) {
            case "GET":
                echo json_encode($jet);
                break;


            case "PATCH":
                $data = $_REQUEST;
                $errors = $this->getValidationErrors($data, false);

                if ( ! empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

                updateJet($jet, $data);

                echo json_encode([
                    "message" => "Jet $id updated"
                ]);
                break;


            case "DELETE":
                $rows = deleteJet($id);

                echo json_encode([
                    "message" => "Jet $id deleted",
                    "rows" => $rows
                ]);
                break;

            default:
                http_response_code(405);
                header("Allow: GET, PATCH, DELETE");
        }
    }

    private function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                echo json_encode(getAllJets());
                break;

            case "POST":
                $data = $_REQUEST;

                $errors = $this->getValidationErrors($data);

                if ( ! empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

                $id = createJet($data);

                http_response_code(201);
                echo json_encode([
                    "message" => "Jet created"
                ]);
                break;

            default:
                http_response_code(405);
                header("Allow: GET, POST");
        }
    }

    private function getValidationErrors(array $data, bool $is_new = true): array
    {
        $errors = [];

        if ($is_new && empty($data["jet_id"])) {
            $errors[] = "jet_id is required";
        }

        if ($is_new && empty($data["jet_type"])) {
            $errors[] = "jet_type";
        }

        if ($is_new && empty($data["total_capacity"])) {
            $errors[] = "total_capacity is required";
        }

        if ($is_new && empty($data["active"])) {
            $errors[] = "active is required";
        }

        if (array_key_exists("active", $data)) {
            if ($data["active"] != 'Yes' and $data["active"] != 'No') {
                $errors[] = "Active should be 'yes' or 'no'";
            }
        }

        if (array_key_exists("size", $data)) {
            if (filter_var($data["size"], FILTER_VALIDATE_INT) === false) {
                $errors[] = "size must be an integer";
            }
        }

        return $errors;
    }
}