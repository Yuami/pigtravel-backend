<?php
header("Content-Type: application/json");
session_start();
require_once("conn.php");
if (isset($_GET["idVivienda"])){
    $idVivienda = $_GET["idVivienda"];
    $sql = "SELECT upper(persona.nombre) as nombreSender, 
       vivienda.id as viviendaID,
       upper(vivienda.nombre) as nombreCasa,
       concat(substring(mensajes.mensaje,1,50),'...') as mensaje,
       date(mensajes.fechaEnviado) as fechaEnviado ,
       mensajes.leido
FROM mensajes
  inner join persona on persona.id=mensajes.idSender 
inner join vivienda on vivienda.id=mensajes.idVivienda 
where mensajes.idVivienda= :idVivienda and mensajes.idSender=".$_SESSION["userId"]."
order by mensajes.fechaEnviado desc";
    $statement = $conn->prepare($sql);
    $statement->bindValue(":idVivienda", $idVivienda);
} else {
    $sql = "SELECT upper(persona.nombre) as nombreSender, 
       vivienda.id as viviendaID,
       upper(vivienda.nombre) as nombreCasa,
       concat(substring(mensajes.mensaje,1,50),'...') as mensaje,
       date(mensajes.fechaEnviado) as fechaEnviado ,
       mensajes.leido
FROM mensajes
  inner join persona on persona.id=mensajes.idSender 
inner join vivienda on vivienda.id=mensajes.idVivienda 
where mensajes.idSender=".$_SESSION["userId"]."
order by mensajes.fechaEnviado desc";
    $statement = $conn->prepare($sql);
}
$statement->execute();
$res = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($res);