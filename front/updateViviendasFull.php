<?php
header("Content-Type: application/json; charset=UTF-8");
require_once("conn.php");
$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content);

$id = $decoded->id;
$nombre = $decoded->nombre;

$statement = "UPDATE vivienda set nombre ='$nombre' where id = $id";

$res = $conn->query($statement);