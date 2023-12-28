<?php

require "../models/passengers.php";
class RestPassenger
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
        $user = getPassenger($id);

        if ( ! $user) {
            http_response_code(404);
            echo json_encode(["message" => "Passenger not found"]);
            return;
        }

        switch ($method) {
            case "GET":
                echo json_encode($user);
                break;


            case "DELETE":
                $rows = deletePassenger($id);

                echo json_encode([
                    "message" => "Passenger $id deleted",
                    "rows" => $rows
                ]);
                break;

            default:
                http_response_code(405);
                header("Allow: GET, DELETE");
        }
    }

    private function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                echo json_encode(getAllPassengers());
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
                    "message" => "User created",
                    "id" => $id
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

        if (array_key_exists("size", $data)) {
            if (filter_var($data["size"], FILTER_VALIDATE_INT) === false) {
                $errors[] = "size must be an integer";
            }
        }

        return $errors;
    }
}