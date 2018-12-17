<?php

include_once MODEL . "DAO/MensajesDAO.php";
include_once MODEL . "Items/Mensajes.php";
class MessagesController {

    public static function show() {
        require_once VIEW . 'messages.php';
    }

}


