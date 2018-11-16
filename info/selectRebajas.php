<?php
header("Content-Type: application/json");
require_once "conn.php";



if (isset($_GET["idTarifa"])){
    $idTarifa = $_GET["idTarifa"];
    $sql = "SELECT * from rebaja WHERE idTarifa = :idTarifa";
    $statement = $conn->prepare($sql);
    $statement->bindValue(":idTarifa", $idTarifa);
} else {
    $sql = "SELECT * from rebaja";
    $statement = $conn->prepare($sql);
}
$statement->execute();
$res = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($res);