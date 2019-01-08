<?php
header("Content-Type: application/json; charset=UTF-8");
require_once("conn.php");
$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content);

$id = $decoded->id;

$statement = "DELETE FROM vivienda where id = $id LIMIT 1";

$res = $conn->query($statement) or die(mysqli_error($statement));
echo json_encode($res);
