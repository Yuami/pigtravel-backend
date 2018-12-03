<?php
header("Content-Type: application/json");
require_once("conn.php");
$statement = "SELECT upper(persona.nombre) as nombreSender, 
       upper(vivienda.nombre) as nombreCasa,
       concat(substring(mensajes.mensaje,1,50),'...') as mensaje,
       date(mensajes.fechaEnviado) as fechaEnviado ,
       mensajes.leido
FROM mensajes
  inner join persona on persona.id=mensajes.idSender 
inner join vivienda on vivienda.id=mensajes.idVivienda 
order by mensajes.fechaEnviado desc";

$res = $conn->prepare($statement);
$res->execute();
$rows = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows, JSON_PRETTY_PRINT);