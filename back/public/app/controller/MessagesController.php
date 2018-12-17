<?php

include_once DAO . "MensajesDAO.php";

class MessagesController extends Controller {

    public function show($id) {
        require_once VIEW . 'messages.php';
    }

    public function index() {
        require_once VIEW . 'messages.php';
    }
    public static function recibidos($idUsuari) {
        $mensajes = MensajesDAO::getBy("idReciever",$idUsuari);
        return $mensajes;
    }

    public function create() {
        // TODO: Implement create() method.
    }

    public function store() {
        // TODO: Implement store() method.
    }

    public function edit($id) {
        // TODO: Implement edit() method.
    }

    public function update($id) {
        // TODO: Implement update() method.
    }

    public function destroy() {
        // TODO: Implement destroy() method.
    }


}


