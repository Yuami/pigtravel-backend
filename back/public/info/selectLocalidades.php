<?php
header("Content-Type: application/json; charset=UTF-8");
require_once("conn.php");

$statement ="select chi.nombre, chi.idCiudad
from ciudad_has_idioma chi group by nombre";

$res = $conn->prepare($statement);
$res->execute();
$rows = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);
