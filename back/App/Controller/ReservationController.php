<?php

namespace Controller;

use Config\Session;
use Model\DAO\EstadoDAO;
use Model\DAO\EstadoHasIdiomaDAO;
use Model\DAO\ReservaDAO;
use Model\DAO\MensajesDAO;
use Model\DAO\ReservaHasEstadoDAO;
use Model\Items\Reserva;
use Model\Items\ReservaHasEstado;
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
        $estados = EstadoDAO::getAll();
        $reserva = ReservaDAO::getById($id);
        $reserva->cancelIfNeeded();
        $mensajes = MensajesDAO::getByidReserva($id);
        if ($reserva && Auth::verifyVendedor($reserva->getVendedor()->getId())) {
            require_once VIEW . 'reservation.php';
        } else {
            Auth::setError("No tienes permiso para ver esa reserva!");
            Router::redirect("reservations");
        }
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store()
    {

    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id)
    {
        if (isset($_POST['estado']) && $_POST['estado'] != 4) {
            $reserva = ReservaDAO::getById($id);
            if (!$reserva instanceof Reserva) {
                Auth::setError('Algo ha ido mal en el servidor!');
                Router::redirect('reservations/' . $id);
            }

            if ($reserva->checkInPast()) {
                Auth::setError('No puedes cambiar el estado a una reserva que ya ha pasado');
                Router::redirect('reservations/' . $id);
            }

            if ($reserva && Auth::verifyVendedor($reserva->getVendedor()->getId())) {
                $estado = ReservaHasEstado::getLastEstado($reserva)->getIdEstado();
                if ($estado != 1) {
                    $reserva->updateEstado($_POST['estado']);
                    Session::success('Se ha cambiado el estado correctamente!');
                }
            }
        }

        Router::redirect('reservations/' . $id);
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }

    public function oferta($id)
    {
        if (!isset($_POST['oferta'])) {
            Auth::setError('No se ha podido crear la oferta!');
            Router::redirect('reservations/' . $id);
        }
        $reserva = ReservaDAO::getById($id);

        if (!$reserva instanceof Reserva) {
            Auth::setError('Hay problemas en el servidor intentalo más tarde!');
            Router::redirect('reservations/' . $id);
        }

        if (!(Auth::verifyVendedor($reserva->getVendedor()->getId()))) {
            Auth::setError('No tienes permisos para crear ofertas de esta reserva!');
            Router::redirect('reservations/' . $id);
        }

        $oferta = $_POST['oferta'];
        if ($oferta < $reserva->getPrecio()) {
            $newReserva = ReservaDAO::insert([
                'checkIn' => $reserva->getCheckIn(),
                'checkOut' => $reserva->getCheckOut(),
                'precio' => $oferta,
                'totalClientes' => $reserva->getTotalClientes(),
                'idVivienda' => $reserva->getIdVivienda(),
                'idMetodoPago' => $reserva->getIdMetodoPago(),
                'idCliente' => $reserva->getIdCliente(),
            ]);
            Session::success('La oferta se ha creado correctamente! ✌');
            Router::redirect('reservations/' . $newReserva->getId());
        }
        Auth::setError('Eso no es una buena oferta! Pon un precio más bajo 😞');
        Router::redirect('reservations/' . $id);
    }
}
