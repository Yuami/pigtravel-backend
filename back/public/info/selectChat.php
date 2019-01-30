<?php
require_once "conn.php";
session_start();
$enlace = mysqli_connect('localhost', 'root', '');
$bd_seleccionada = mysqli_select_db( $enlace,'travel');

$rows = mysqli_query($enlace,'SELECT * from mensajes');
while ($row = mysqli_fetch_assoc($rows)){
    $comment = $row['mensaje'];
    ?>
    <div class="chats"> <?=$comment?></div>


<?php }?>