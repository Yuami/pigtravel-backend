<?php
header("Content-Type: application/json");
require_once "conn.php";
$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content);

$id = $decoded->id;

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "delete from vivienda where id = $id";
$statement = $conn->prepare($sql);
$statement->execute();