<?php
header("Content-Type: application/json");
require_once "conn.php";

$sql = "SELECT * FROM tarifa";
$statement = $conn->prepare($sql);
$statement->execute();
$res = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($res, JSON_PRETTY_PRINT);