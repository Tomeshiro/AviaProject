<?php

require "../models/user.php";

class RestUser
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
        $user = getUser($id);

        if ( ! $user) {
            http_response_code(404);
            echo json_encode(["message" => "User not found", "id" => "$id"]);
            return;
        }

        switch ($method) {
            case "GET":
                echo json_encode($user);
                break;


            case "PATCH":
                $data = $_REQUEST;
                $errors = $this->getValidationErrors($data, false);

                if ( ! empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

                updateUser($user, $data);

                echo json_encode([
                    "message" => "User $id updated"
                ]);
                break;

            case "DELETE":
                $rows = deleteUser($id);

                echo json_encode([
                    "message" => "User $id deleted",
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
                echo json_encode(getAllUsers());
                break;

            case "POST":
                $data = $_REQUEST;

                $errors = $this->getValidationErrors($data);

                if ( ! empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

                createUser($data);

                http_response_code(201);
                echo json_encode([
                    "message" => "User created"
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

        if ($is_new && empty($data["user_id"])) {
            $errors[] = "user_id is required";
        }

        if ($is_new && empty($data["pwd"])) {
            $errors[] = "pwd is required";
        }

        if ($is_new && empty($data["name"])) {
            $errors[] = "name is required";
        }

        if ($is_new && empty($data["email"])) {
            $errors[] = "email is required";
        }

        if ($is_new && empty($data["phone_no"])) {
            $errors[] = "phone_no is required";
        }

        if ($is_new && empty($data["address"])) {
            $errors[] = "address is required";
        }

        if ($is_new && empty($data["role"])) {
            $errors[] = "role is required";
        }

        if (array_key_exists("role", $data)) {
            if ($data["role"] != 'admin' and $data["role"] != 'normal') {
                $errors[] = "Role should be 'admin' or 'normal'";
            }
        }

        if (array_key_exists("email", $data)) {
            if (filter_var($data["email"], FILTER_VALIDATE_EMAIL) === false) {
                $errors[] = "incorrect email";
            }
        }

        return $errors;
    }
}