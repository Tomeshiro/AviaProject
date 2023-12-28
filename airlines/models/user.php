<?php
include_once "jet.php";

function getUser(string $user_id): array|false
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM user WHERE user_id = :user_id");
    $stmt->execute(['user_id' => $user_id]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}


function getAllUsers(): array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM user");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $data[] = $row;
    }
    return $data;
}


function createUser(array $data): string
{
    $sql = "INSERT INTO user (user_id, pwd, name, email, phone_no, address, role)
                VALUES (:user_id, :pwd, :name, :email, :phone_no, :address, :role)";
    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":user_id", $data["user_id"], PDO::PARAM_STR);
    $stmt->bindValue(":pwd", $data["pwd"], PDO::PARAM_STR);
    $stmt->bindValue(":name", $data["name"], PDO::PARAM_STR);
    $stmt->bindValue(":email", $data["email"], PDO::PARAM_STR);
    $stmt->bindValue(":phone_no", $data["phone_no"], PDO::PARAM_STR);
    $stmt->bindValue(":address", $data["address"], PDO::PARAM_STR);
    $stmt->bindValue(":role", $data["role"], PDO::PARAM_STR);

    $stmt->execute();

    return $pdo->lastInsertId();
}


function updateUser(array $current, array $new): int
{
    $sql = "UPDATE user
                SET pwd = :pwd, name = :name, email = :email, phone_no = :phone_no, 
                    address = :address, role = :role 
                WHERE user_id = :user_id";

    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":pwd", $new["pwd"] ?? $current["pwd"], PDO::PARAM_STR);
    $stmt->bindValue(":name", $new["name"] ?? $current["name"], PDO::PARAM_STR);
    $stmt->bindValue(":email", $new["email"] ?? $current["email"], PDO::PARAM_STR);
    $stmt->bindValue(":phone_no", $new["phone_no"] ?? $current["phone_no"], PDO::PARAM_STR);
    $stmt->bindValue(":address", $new["address"] ?? $current["address"], PDO::PARAM_STR);
    $stmt->bindValue(":role", $new["role"] ?? $current["role"], PDO::PARAM_STR);

    $stmt->bindValue(":user_id", $current["user_id"], PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->rowCount();
}


function deleteUser(string $user_id): int
{
    $sql = "DELETE FROM user WHERE user_id = :user_id";
    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":user_id", $user_id, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->rowCount();
}