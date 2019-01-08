<?php
namespace Controller;

use Model\DAO\MensajesDAO;

class MessagesController extends Controller {

    public function show($id) {
    }

    public function index() {
        require_once VIEW . 'messages.php';
    }
    public static function recibidos($idUsuari) {
        $mensajes = MensajesDAO::getBy("idReciever",$idUsuari);
        return $mensajes;
    }

    public function create() {

    }

    public function store() {
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


