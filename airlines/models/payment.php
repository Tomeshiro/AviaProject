<?php
include_once "jet.php";

function getPayment(string $payment_id): array|false
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM payment_details WHERE payment = :payment_id");
    $stmt->execute(['payment_id' => $payment_id]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}


function getAllPayments(): array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM payment_details");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $data[] = $row;
    }
    return $data;
}


function deletePayment(string $payment_id): int
{
    $sql = "DELETE FROM payment_details WHERE payment_id = :payment_id";
    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":payment_id", $payment_id, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->rowCount();
}