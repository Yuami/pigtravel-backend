<?php

namespace Controller;

use Config\Cookie;
use Config\Router;
use Config\Session;
use Model\DAO\ViviendaDAO;

class HouseController extends Controller
{

    public function validUser($userID, $vivienda)
    {
        if ($vivienda == NULL || $userID !== $vivienda->getIdVendedor()) {
            Session::set("wrongHouse", "true");
            Router::redirect("houses");
            return false;
        }
        return true;
    }

    public function index()
    {
        include_once VIEW . "houselist.php";
    }

    public function show($id)
    {
        $vInfo = ViviendaDAO::getById($id);
        if ($this->validUser(Session::get('userID'), $vInfo)) {
            include_once VIEW . "house.php";
        }
    }

    public function create()
    {
        include_once VIEW . "houseAdd.php";
    }

    public function store()
    {
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