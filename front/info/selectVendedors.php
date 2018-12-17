<?php
header("Content-Type: application/json; charset=UTF-8");
require_once("conn.php");

$statement = "select vv.idPersona, p.nombre from persona p, vendedor_vivienda vv, vivienda v where
p.id = vv.idPersona and v.idVendedor = vv.idPersona group by vv.idPersona;";

$res = $conn->prepare($statement);
$res->execute();
$rows = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);
