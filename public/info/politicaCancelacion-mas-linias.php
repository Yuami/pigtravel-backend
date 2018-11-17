<?php
header("Content-Type: application/json");
require_once "conn.php";
$sql = 'SELECT p.id, p.nombre, group_concat(concat("Linia: ", l.id, " Dias: ", l.dias, " Porcentaje: ", l.porcentaje)) linias
from politicas_cancelacion p
inner join linia_politica_cancelacion l on p.id = l.idPoliticaCancelacion group by p.id order by l.id;';

$statement = $conn->prepare($sql);
$statement->execute();
$res = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($res);
