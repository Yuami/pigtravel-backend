<?php

namespace Controller;

use Config\Session;
use Handler\Auth;
use Model\DAO\MensajesDAO;
use Model\DAO\PersonaDAO;
use Model\DAO\ReservaDAO;
use Model\DAO\ViviendaDAO;
use Routing\Router;

class MessagesController extends Controller
{

    public function show($id)
    {
        $reserva = ReservaDAO::getById($id);
        if (isset($reserva) && Auth::verifyVendedor($reserva->getVendedor()->getId())) {
            $mensajes = MensajesDAO::getByidReserva($id);
            $viviendas = ViviendaDAO::getBy('idVendedor', Session::get('userID'));
            $recievers = array();
            if (isset($mensajes))
                foreach ($mensajes as $mensaje) {
                    $recievers[$mensaje->getIdSender()] = PersonaDAO::getBy("id", $mensaje->getIdSender());
                }
            require_once VIEW . 'messages.php';
        } else {
            Auth::setError("You do not have access to that messages");
            Router::redirect("messages");
        }
    }

    public function index()
    {
        $id = Session::get('userID');
        $mensajes = MensajesDAO::getBy("idReciever", $id);
        $mensajesChat = MensajesDAO::getChat($id);
        $recievers = array();
        foreach ($mensajes as $mensaje) {
            $recievers[$mensaje->getIdSender()] = PersonaDAO::getBy("id", $mensaje->getIdSender());
        }
        $viviendas = ViviendaDAO::getBy('idVendedor', $id);
        require_once VIEW . 'messages.php';
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public
    function store()
    {
        MensajesDAO::leido($_POST['idMensaje']);
        MensajesDAO::insert([
            "idReciever" => $_POST['idReciever'],
            "mensaje" => $_POST['mensajeRespuesta'],
            "idVivienda" => $_POST['idVivienda']]);
        header("Location: " . DOMAIN . "/messages");
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }


}


