<?php

include_once DAO . "MensajesDAO.php";

class SendMessagesController extends Controller {

    public function show() {

    }

    public function index() {
        require_once VIEW . 'messagesSent.php';
    }
    public static function enviados($idUsuari) {
        $mensajes = MensajesDAO::getBy("idSender",$idUsuari);
        return $mensajes;
    }

    public function create() {
        // TODO: Implement create() method.
    }

    public function store() {
        // TODO: Implement store() method.
    }

    public function edit() {
        // TODO: Implement edit() method.
    }

    public function update() {
        // TODO: Implement update() method.
    }

    public function destroy() {
        // TODO: Implement destroy() method.
    }


}

