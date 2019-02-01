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
       inner join estado_has_idioma ehi
                  on ehi.idEstado = rhe.idEstado and ehi.nombre='" . $_GET['estado'] . "' where idVendedor = 9";
    $stmt = $conn->prepare($sql);
} else {
    $stmt = $conn->prepare("select v.nombre   nomVivienda,
       p.nombre   nomPersona,
       ehi.nombre nomEstat,
       e.id       idEstat,
       v.id       idVivienda,
       fechaReserva,
       precio     preu
from vivienda v
       inner join reserva r on v.id = r.idVivienda
       inner join reserva_has_estado rhe on r.id = rhe.idReserva
       inner join persona p on r.idCliente = p.id
       inner join estado e on rhe.idEstado = e.id
       inner join estado_has_idioma ehi on e.id = ehi.idEstado where idVendedor=9");
}
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($result);
echo $json;
?>