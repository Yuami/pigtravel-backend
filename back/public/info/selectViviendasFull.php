<?php
header("Content-Type: application/json; charset=UTF-8");
require_once("conn.php");

$statement ="SELECT v.nombre as Name, tvhi.nombre HouseType, v.capacidad MaxPax, v.calle Street, chi.nombre City, v.horaEntrada CheckIn, v.horaSalida CheckOut, v.alquilerAutomatico StandardPrice, v.metrosCuadrados SquareMeters
from vivienda v, tipo_vivienda_has_idioma tvhi, ciudad_has_idioma chi
where tvhi.idTipo_vivienda = v.idTipoVivienda and 
chi.idCiudad = v.idCiudad";

$res = $conn->prepare($statement);
$res->execute();
$rows = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);
