<?php

class HouseController
{
    public static function index()
    {
        include_once VIEW . "houselist.php";
    }

    public static function show()
    {
        include_once VIEW . "house.php";
    }

    public static function create()
    {
        include_once VIEW . "houseAdd.php";
    }

    public static function store()
    {
        include_once ITEM . "Vivienda.php";
        include_once DAO . "ViviendaDAO.php";
        ViviendaDAO::insert([
            "nombre" => $_POST['houseName'],
            "capacidad" => $_POST['peopleAmount'],
            "coordX" => 0,
            "coordY" => 0,
            "metrosCuadrados" => $_POST['squaremeters'],
            "calle" => $_POST['street'],
            "horaEntrada" => $_POST['checkIn'],
            "horaSalida" => $_POST['checkOut'],
            "alquilerAutomatico" => $_POST['standardRate'],
            "idTipoVivienda" => 1,
            "idCiudad" => $_POST['city'],
            "idVendedor" => Session::get('userID'),
            "descripcion" => $_POST['description']]);
        header("Location: " . DOMAIN . "/houses");
    }
}