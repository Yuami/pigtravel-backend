<?php
header("Content-Type: application/json; charset=UTF-8");
require_once("conn.php");
$getIdVendedor = $_GET['idVendedor'];

$statement = "select v.id, v.nombre from vivienda v, vendedor_vivienda vv where
    $getIdVendedor = v.idVendedor group by v.id";

$res = $conn->prepare($statement);
$res->execute();
$rows = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);
