<?php
header("Content-Type: application/json");
require_once("conn.php");
if (isset($_GET["idVivienda"])){
    session_start();
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
where mensajes.idVivienda= :idVivienda and mensajes.idSender=".$_SESSION["userID"]."
order by mensajes.fechaEnviado desc";
    $statement = $conn->prepare($sql);
    $statement->bindValue(":idVivienda", $idVivienda);
} else {
    session_start();
    $sql = "SELECT upper(persona.nombre) as nombreSender, 
       vivienda.id as viviendaID,
       upper(vivienda.nombre) as nombreCasa,
       concat(substring(mensajes.mensaje,1,50),'...') as mensaje,
       date(mensajes.fechaEnviado) as fechaEnviado ,
       mensajes.leido
FROM mensajes
  inner join persona on persona.id=mensajes.idSender 
inner join vivienda on vivienda.id=mensajes.idVivienda 
where mensajes.idSender=".$_SESSION["userID"]."
order by mensajes.fechaEnviado desc";
    $statement = $conn->prepare($sql);
}
$statement->execute();
$res = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($res);