<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 21/11/18
 * Time: 17:31
 */
header("Content-Type: application/json");
require_once("conn.php");
if (isset($_GET['vivienda'])) {
    $sql = "SELECT v.nombre nom
FROM vivienda v
       inner join reserva r on v.id = r.idVivienda
       inner join reserva_has_estado rhe on r.id = rhe.idReserva
       inner join estado_has_idioma
         on estado_has_idioma.idEstado = idReserva and estado_has_idioma.nombre ='" . $_GET['vivienda'] . "'";
    $stmt = $conn->prepare($sql);
} else {
    $stmt = $conn->prepare("select r.idVivienda idVivienda, v.nombre nomVivienda, p.nombre nomPersona, ehi.nombre nomEstat,e.id idEstat,v.id idVivienda,fechaReserva  , precio preu
from vivienda v
       inner join reserva r on v.id = r.idVivienda
       inner join cliente c on idPersona = idCliente
       inner join persona p on p.id = idPersona
       inner join estado e on e.id = r.id
       inner join estado_has_idioma ehi on e.id = idEstado");
}

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($result);
echo $json;
