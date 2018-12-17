<?php
require_once MODEL . "Items/Reserva.php";
require_once MODEL . "DAO/ReservaDAO.php";

class ReservationController extends Controller {
    public function index() {
        require_once VIEW . 'reservations.php';
    }

    public function show() {
        require_once VIEW . 'reservation.php';
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