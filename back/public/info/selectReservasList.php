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
    $sql = "SELECT v.nombre
from vivienda v
       inner join reserva r on v.id = r.idVivienda
       inner join reserva_has_estado rhe on r.id = rhe.idReserva
       inner join estado_has_idioma ehi on rhe.idEstado = ehi.idEstado
where ehi.nombre ='" . $_GET['vivienda'] . "'";
    $stmt = $conn->prepare($sql);
} else {
    $stmt = $conn->prepare("SELECT r.id idReserva, v.nombre nomV,ehi.nombre estado, p.nombre nomP, r.fechaReserva, r.precio preu
from reserva r
       inner join reserva_has_estado rhe on r.id = rhe.idReserva
       inner join vivienda v on r.idVivienda = v.id
       inner join estado_has_idioma ehi on rhe.idEstado = ehi.idEstado
       inner join cliente c on r.idCliente = c.idPersona
       inner join persona p on c.idPersona = p.id");
}

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($result);
echo $json;
