<?php
/**
 * Created by PhpStorm.
 * User: troll
 * Date: 21/11/18
 * Time: 17:31
 */
header("Content-Type: application/json");
require_once("conn.php");
$stmt = $conn->prepare("select nombre from estado_has_idioma");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($result);
echo $json;
?>