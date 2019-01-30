<?php
$enlace = mysqli_connect('localhost', 'root', '');
$bd_seleccionada = mysqli_select_db( $enlace,'travel');

if(isset($_POST['user_comm'])) {
    $mensaje = $_POST['user_comm'];
    $rows = mysqli_query($enlace, "insert into mensajes (idSender,idReciever,mensaje,fechaEnviado,leido,idVivienda,idReserva) values(7,3,'$mensaje',CURRENT_TIMESTAMP,1,3,4)");
}
?>
