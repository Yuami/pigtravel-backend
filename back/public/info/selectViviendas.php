<?php
header("Content-Type: application/json; charset=UTF-8");
require_once("conn.php");

$statement = "select v.nombre, v.calle, v.idTipoVivienda, v.idCiudad from vivienda v, vendedor_vivienda vv group by v.id";

$res = $conn->prepare($statement);
$res->execute();
$rows = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);
