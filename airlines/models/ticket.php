<?php
include_once "jet.php";



function getTicket(string $pnr): array|false
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM ticket_details WHERE pnr = :pnr");
    $stmt->execute(['pnr' => $pnr]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}


function getAllTickets(): array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM ticket_details");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $data[] = $row;
    }
    return $data;
}


function deleteTicket(string $pnr): int
{
    $sql = "DELETE FROM ticket_details WHERE pnr = :pnr";
    $pdo = getPDO();
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":pnr", $pnr, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->rowCount();
}