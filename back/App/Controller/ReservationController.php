<?php

namespace Controller;

use Config\Session;
use Model\DAO\EstadoDAO;
use Model\DAO\EstadoHasIdiomaDAO;
use Model\DAO\ReservaDAO;
use Model\DAO\MensajesDAO;
use Routing\Router;
use Handler\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $estados = EstadoHasIdiomaDAO::getAll();
        $id = Session::get('userID');
        $reservas = ReservaDAO::getByVendedor($id);
        require_once VIEW . 'reservations.php';
    }

    public function show($id)
    {
        $reserva = ReservaDAO::getById($id);
        $mensajes = MensajesDAO::getByidReserva($id);
        if ($reserva && Auth::verifyVendedor($reserva->getVendedor()->getId())) {
            require_once VIEW . 'reservation.php';
        } else {
            Auth::setError("Reservation");
            Router::redirect("reservations");
        }
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store()
    {
        // TODO: Implement store() method.
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