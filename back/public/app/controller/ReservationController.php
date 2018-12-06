<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 04/12/2018
 * Time: 15:12
 */

class ReservationController {
    public static function show() {
        include_once VIEW . "reservations.php";
    }

    public static function showReservation() {
        include_once VIEW . "reservation.php";
    }

}