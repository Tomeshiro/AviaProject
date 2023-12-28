<?php
include_once "jet.php";




function getFlight(string $flight_no): array|false
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM flight_details WHERE flight_no = :flight_no");
    $stmt->execute(['flight_no' => $flight_no]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}


function getAllFlights(): array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM flight_details");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $data[] = $row;
    }
    return $data;
}


function deleteFlight(string $flight_no): int
{
    $sql = "DELETE FROM flight_details WHERE flight_no = :flight_no";
    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":flight_no", $flight_no, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->rowCount();
}