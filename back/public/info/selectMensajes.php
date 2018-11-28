<?php
require_once("conn.php");
$sql = "SELECT persona.nombre as nombreSender, 
       vivienda.nombre as nombreCasa,
       concat(substring(mensajes.mensaje,1,2),'...') as mensaje,
       mensajes.fechaEnviado 
FROM mensajes
  inner join persona on persona.id=mensajes.idSender 
inner join vivienda on vivienda.id=mensajes.idVivienda 
order by mensajes.fechaEnviado desc";
$stmt = $conn->prepare($sql);
$stmt->execute();

$return_arr = array();
$columns = array(
    0 =>'nombreSender',
    1 =>'nombreCasa',
    2 =>'mensaje',
    3 =>'fechaEnviado'
);
foreach ($stmt as $row) {
    $row_array['nombreSender'] = $row['nombreSender'];
    $row_array['nombreCasa'] = $row['nombreCasa'];
    $row_array['mensaje'] = $row['mensaje'];
    $row_array['fechaEnviado'] = $row['fechaEnviado'];
    array_push($return_arr,$row_array);
}
$json_data = array(
    "records"            => $return_arr
);
echo json_encode($json_data);

