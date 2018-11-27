<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT * FROM mensajes";
$query=mysqli_query($conn, $sql);


$return_arr = array();
$columns = array(
    0 =>'mensaje'
);
while ($row = mysqli_fetch_array($query)) {
    $row_array['mensaje'] = $row['mensaje'];

    array_push($return_arr,$row_array);
}
$json_data = array(
    "records"            => $return_arr
);
echo json_encode($json_data);