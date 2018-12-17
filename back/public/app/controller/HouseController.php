<?php

class HouseController extends Controller
{
    public function index()
    {
        include_once VIEW . "houseList.php";
    }

    public function show()
    {
        include_once VIEW . "house.php";
    }

    public function create()
    {
        include_once VIEW . "houseAdd.php";
    }

    public function store()
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