<?php

use Config\Session;
use Model\DAO\DB;

header("Content-Type: application/json; charset=UTF-8");
require_once($_SERVER['DOCUMENT_ROOT'] . "/basicVars.php");

session_start();

$statement ="select v.id, v.nombre vivienda, tvhi.nombre tipo, chi.nombre ciudad
from vivienda v
inner join ciudad c on v.idCiudad = c.id
inner join ciudad_has_idioma chi on c.id = chi.idCiudad
inner join tipo_vivienda tv on v.idTipoVivienda = tv.id
inner join tipo_vivienda_has_idioma tvhi on tv.id = tvhi.idTipo_vivienda
where v.idVendedor =" . Session::get('userID');

$res = DB::conn()->prepare($statement);
$res->execute();
$rows = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);
