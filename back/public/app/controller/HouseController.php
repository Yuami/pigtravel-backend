<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 04/12/2018
 * Time: 15:12
 */

class HouseController {
    public static function index() {
        include_once VIEW . "houselist.php";
    }

    public static function showHouse() {
        include_once VIEW . "house.php";
    }

    public static function create() {
        include_once VIEW . "houseAdd.php";
    }

}