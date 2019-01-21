<?php
namespace Controller;

use Config\Session;
use Model\DAO\MensajesDAO;
use Model\DAO\ViviendaDAO;

class SendMessagesController extends Controller {

    public function show($id) {

    }

    public function index() {
        $id= Session::get('userID');
        $mensajes = MensajesDAO::getBy("idSender",$id);
        $viviendas= ViviendaDAO::getBy('idVendedor',$id);
        include_once VIEW . 'messagesSent.php';
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

