<?php
header("Content-Type: application/json");
require_once "conn.php";

$sql = "
SELECT v.id id, v.nombre vivienda, t.id tarifa
from tarifa t 
inner join vivienda_has_tarifa vt on t.id = vt.idTarifa 
inner join vivienda v on vt.idVivienda = v.id";

$statement = $conn->prepare($sql);
$statement->execute();

$res = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($res);