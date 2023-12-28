<?php
include_once "jet.php";

function getPassenger(string $passenger_id): array|false
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM passengers WHERE passenger = :passenger_id");
    $stmt->execute(['passenger_id' => $passenger_id]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}


function getAllPassengers(): array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM passengers");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $data[] = $row;
    }
    return $data;
}


function deletePassenger(string $payment_id): int
{
    $sql = "DELETE FROM passengers WHERE passenger = :passenger_id";
    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":passenger_id", $payment_id, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->rowCount();
}
