<?php
namespace Controller;

use Config\Session;
use Model\DAO\MensajesDAO;
use Model\DAO\ViviendaDAO;

class MessagesController extends Controller {

    public function show($id) {
        $mensajes = MensajesDAO::getByidReserva($id);
        $viviendas= ViviendaDAO::getBy('idVendedor',Session::get('userID'));
        require_once VIEW . 'messages.php';
    }

    public function index() {
        $id= Session::get('userID');
        $mensajes = MensajesDAO::getBy("idReciever",$id);
        $viviendas= ViviendaDAO::getBy('idVendedor',$id);
        require_once VIEW . 'messages.php';
    }
    public function create() {
        // TODO: Implement create() method.
    }

    public function store() {
        MensajesDAO::leido($_POST['leido']);
        MensajesDAO::insert([
            "idReciever" => $_POST['idReciever'],
            "mensaje" => $_POST['mensajeRespuesta'],
            "idVivienda" => $_POST['idVivienda']]);
        header("Location: " . DOMAIN. "/messages");
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


