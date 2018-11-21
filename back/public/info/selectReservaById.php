<?php
header("Content-Type: application/json");
require_once("conn.php");
$stmt = $conn->prepare("SELECT * FROM reserva");
if(isset($_REQUEST['estado'])){
	$stmt = $conn->prepare("SELECT fechaReserva,reserva.id FROM reserva,reserva_has_estado,estado WHERE idEstado=estado.id and idReserva=reserva.id and estado.id=".$_REQUEST['estado']);
}
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json= json_encode($result);
echo $json;
?>