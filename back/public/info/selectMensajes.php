<?php
header("Content-Type: application/json; charset=UTF-8");
require_once("conn.php");

$statement = "select idSender, mensaje, fechaEnviado from mensajes";

$res = $conn->prepare($statement);
$res->execute();
$rows = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);
