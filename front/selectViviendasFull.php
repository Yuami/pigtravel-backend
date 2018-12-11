<?php
header("Content-Type: application/json; charset=UTF-8");
require_once("conn.php");

$statement ="SELECT v.id, v.nombre , tvhi.nombre as HouseType, v.capacidad as MaxPax, v.calle as Street, chi.nombre as City,
v.horaEntrada as CheckIn, v.horaSalida as CheckOut, v.alquilerAutomatico as StandardPrice, v.metrosCuadrados as SquareMeters
from vivienda v, tipo_vivienda_has_idioma tvhi, ciudad_has_idioma chi
where tvhi.idTipo_vivienda = v.idTipoVivienda and 
chi.idCiudad = v.idCiudad";

$res = $conn->prepare($statement);
$res->execute();
$rows = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);
