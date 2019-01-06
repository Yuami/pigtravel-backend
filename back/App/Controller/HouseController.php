<?php

namespace Controller;

use Config\Session;
use Model\DAO\ViviendaDAO;

class HouseController extends Controller
{
    public function index()
    {
        include_once VIEW . "houselist.php";
    }

    public function show($id)
    {
        $vInfo = ViviendaDAO::getById($id);
        include_once VIEW . "house.php";
    }

    public function create()
    {
        include_once VIEW . "houseAdd.php";
    }

    public function store()
    {
        echo "success";
//        ViviendaDAO::insert([
//            "nombre" => $_POST['houseName'],
//            "capacidad" => $_POST['peopleAmount'],
//            "coordX" => 0,
//            "coordY" => 0,
//            "metrosCuadrados" => $_POST['squaremeters'],
//            "calle" => $_POST['street'],
//            "horaEntrada" => $_POST['checkIn'],
//            "horaSalida" => $_POST['checkOut'],
//            "alquilerAutomatico" => $_POST['standardRate'],
//            "idTipoVivienda" => 1,
//            "idCiudad" => $_POST['city'],
//            "idVendedor" => Session::get('userID'),
//            "descripcion" => $_POST['description']]);
//        header("Location: " . DOMAIN . "/houses");
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id)
    {
        ViviendaDAO::update([
            "id" => $id,
            "nombre" => $_POST['houseName'],
            "capacidad" => $_POST['peopleAmount'],
            "metrosCuadrados" => $_POST['squaremeters'],
            "calle" => $_POST['street'],
            "horaEntrada" => $_POST['checkIn'],
            "horaSalida" => $_POST['checkOut'],
            "alquilerAutomatico" => $_POST['standardRate'],
            "idTipoVivienda" => 1,
            "idCiudad" => $_POST['city'],
            "descripcion" => $_POST['description']]);
        header("Location: " . DOMAIN . "/houses/" . $id);
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }


}