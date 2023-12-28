<?php

session_start();

function getPDO(): PDO
{
    try {
        return new \PDO("mysql:host=db;dbname=appDB;charset=utf8mb4", 'user', 'password');

    } catch (\PDOException $e) {
        die("Connection error: {$e->getMessage()}");
    }
}

function getJet(string $jet_id): array|false
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM jet_details WHERE jet_id = :jet_id");
    $stmt->execute(['jet_id' => $jet_id]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}


function getAllJets(): array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM jet_details");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $data[] = $row;
    }
    return $data;
}


function createJet(array $data): string
{
    $sql = "INSERT INTO jet_details (jet_id, jet_type, total_capacity, active)
                VALUES (:jet_id, :jet_type, :total_capacity, :active)";
    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":jet_id", $data["jet_id"], PDO::PARAM_STR);
    $stmt->bindValue(":jet_type", $data["jet_type"], PDO::PARAM_STR);
    $stmt->bindValue(":total_capacity", $data["total_capacity"], PDO::PARAM_INT);
    $stmt->bindValue(":active", $data["active"], PDO::PARAM_STR);

    $stmt->execute();

    return $pdo->lastInsertId();
}


function updateJet(array $current, array $new): int
{
    $sql = "UPDATE jet_details
                SET jet_type = :jet_type, total_capacity = :total_capacity, active = :active
                WHERE jet_id = :jet_id";

    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":jet_type", $new["jet_type"] ?? $current["jet_type"], PDO::PARAM_STR);
    $stmt->bindValue(":total_capacity", $new["total_capacity"] ?? $current["total_capacity"], PDO::PARAM_INT);
    $stmt->bindValue(":active", $new["active"] ?? $current["active"], PDO::PARAM_STR);

    $stmt->bindValue(":jet_id", $current["jet_id"], PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->rowCount();
}


function deleteJet(string $jet_id): int
{
    $sql = "DELETE FROM jet_details WHERE jet_id = :jet_id";
    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":jet_id", $jet_id, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->rowCount();
}