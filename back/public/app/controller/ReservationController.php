<?php

class ReservationController{
    public static function show() {
        include_once VIEW . 'reservations.php';
    }

    public static function showReservation() {
        include_once VIEW . 'reservation.php';
    }
}