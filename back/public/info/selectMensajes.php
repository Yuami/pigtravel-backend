<?php
require_once("conn.php");
$sql = "SELECT persona.nombre, 
       mensajes.mensaje,
       mensajes.fechaEnviado 
FROM mensajes
  inner join persona on persona.id=mensajes.idSender 
order by mensajes.fechaEnviado desc ";
$stmt = $conn->prepare($sql);
$stmt->execute();

$return_arr = array();
$columns = array(
    0 =>'nombre',
    1 =>'mensaje',
    2 =>'fechaEnviado'
);
foreach ($stmt as $row) {
    $row_array['nombre'] = $row['nombre'];
    $row_array['mensaje'] = $row['mensaje'];
    $row_array['fechaEnviado'] = $row['fechaEnviado'];
    array_push($return_arr,$row_array);
}
$json_data = array(
    "records"            => $return_arr
);
echo json_encode($json_data);

