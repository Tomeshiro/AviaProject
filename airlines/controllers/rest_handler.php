<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/$class.php";
});

set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");

header("Content-type: application/json; charset=windows-1251");

$parts = explode("/", $_SERVER["REQUEST_URI"]);

if ($parts[2] != null) {
    $parts[2] = strtok($parts[2], '?');
}

if ($parts[2] != "flights" && $parts[2] != "jets" && $parts[2] != "users" && $parts[2] != "payments"
    && $parts[2] != "tickets" && $parts[2] != "passengers") {
    http_response_code(404);
    exit;
}

$id = $parts[3] ?? null;
if ($id != null) {
    $id = strtok($id, '?');
}
// Заметьте, что используется ===.  Использование == не даст верного
// результата, так как 'a' находится в нулевой позиции.

if ($parts[2] == "jets") {
    $rest_jet = new RestJet();

    $rest_jet->processRequest($_SERVER["REQUEST_METHOD"], $id);
}
else if ($parts[2] == "flights") {
}
else if ($parts[2] == "users") {
    $rest_user = new RestUser();

    $rest_user->processRequest($_SERVER["REQUEST_METHOD"], $id);
}
else if ($parts[2] == "tickets") {
}
else if ($parts[2] == "passengers") {
    $rest_passenger = new RestPassenger();

    $rest_passenger->processRequest($_SERVER["REQUEST_METHOD"], $id);
}
else if ($parts[2] == "payments") {
}