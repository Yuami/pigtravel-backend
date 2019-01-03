<?php
namespace Controller;

use Model\DAO\ReservaDAO;

class ReservationController extends Controller {
    public function index() {
        require_once VIEW . 'reservations.php';
    }

    public function show($id) {
        $reserva = ReservaDAO::getById($id);
        require_once VIEW . 'reservation.php';
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