<?php
header("Content-Type: application/json");
require_once "conn.php";
$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content);

$vivienda = $decoded->vivienda;
$id = $decoded->id;
$tarifa = $decoded->tarifa;
$lastTarifa = $decoded->lastTarifa;

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "update vivienda set nombre = '$vivienda' where id = $id";
$statement = $conn->prepare($sql);
$statement->execute();

$sql = "update vivienda_has_tarifa set idTarifa = $tarifa where idVivienda = $id and idTarifa = $lastTarifa";
$statement = $conn->prepare($sql);
$statement->execute();