<?php
header("Content-Type: application/json; charset=UTF-8");
require_once("conn.php");

$statement ="select tvhi.idTipo_vivienda, tvhi.nombre
from tipo_vivienda_has_idioma tvhi, tipo_vivienda tv
where tvhi.idTipo_vivienda = tv.id";

$res = $conn->prepare($statement);
$res->execute();
$rows = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows, JSON_PRETTY_PRINT);
