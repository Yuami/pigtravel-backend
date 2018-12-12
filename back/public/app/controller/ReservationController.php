<?php
require_once MODEL . "Items/Reserva.php";
require_once MODEL . "DAO/ReservaDAO.php";

class ReservationController{
    public static function show() {
        require_once VIEW . 'reservations.php';
    }

    public static function showReservation($id) {
         $reserva = ReservaDAO::getById($id);
        require_once VIEW . 'reservation.php';
    }
}