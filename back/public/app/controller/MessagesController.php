<?php

require_once MODEL . "DAO/MensajesDAO.php";
require_once MODEL . "Items/Reserva.php";
class MessagesController {

    public static function show() {
        require_once VIEW . 'messages.php';
    }

}


