<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 21/11/18
 * Time: 17:31
 */
header("Content-Type: application/json");
require_once("conn.php");
$stmt = $conn->prepare("select v.nombre nomVivienda, p.nombre nomPersona, ehi.nombre nomEstat, fechaReserva, precio
from vivienda v
       inner join reserva r on v.id = idVivienda 
       inner join cliente c on idPersona = idCliente
       inner join persona p on p.id = idPersona
       inner join estado e on e.id = r.id
       inner join estado_has_idioma ehi on e.id = idEstado;");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($result);
echo $json;
?>