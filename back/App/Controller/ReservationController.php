<?php

namespace Controller;

use Config\Session;
use Model\DAO\ReservaDAO;
use Model\DAO\MensajesDAO;

class ReservationController extends Controller
{
    public function index()
    {
        $id = Session::get('userID');
        $reservas = ReservaDAO::getByVendedor($id);

        require_once VIEW . 'reservations.php';
    }

    public function show($id)
    {
        $reserva = ReservaDAO::getById($id);
        $mensajes = MensajesDAO::getByidReserva($id);
        require_once VIEW . 'reservation.php';
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