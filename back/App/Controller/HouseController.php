<?php

namespace Controller;

use Config\Cookie;
use Model\DAO\CiudadDAO;
use Routing\Router;
use Config\Session;
use Model\DAO\ViviendaDAO;

class HouseController extends Controller
{

    public static function validUser($userID, $vivienda)
    {
        if ($vivienda == NULL || $userID !== $vivienda->getIdVendedor()) {
            Session::set("wrongHouse", "true");
            Router::redirectWithDomain("houses");
            return false;
        }
        return true;
    }

    public function updateCompleted($completed)
    {
        Session::set("updateCompleted", $completed);
    }

    public function index()
    {
        $id = Session::get('userID');
        $houses = ViviendaDAO::getByVendedor($id);
        include_once VIEW . "houselist.php";
    }

    public function show($id)
    {
        $houses = ViviendaDAO::getById($id);
        if (self::validUser(Session::get('userID'), $houses)) {
            include_once VIEW . "house.php";
        }
    }

    public function create()
    {
        $ciudades = CiudadDAO::getByIdRegion(970);
        include_once VIEW . "houseAdd.php";
    }

    public function store()
    {
        ViviendaDAO::insert([
            "nombre" => $_POST['houseName'],
            "capacidad" => $_POST['peopleAmount'],
            "coordX" => $_POST['lan'],
            "coordY" => $_POST['lon'],
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
        $houses = ViviendaDAO::getById($id);
        if ($this->validUser(Session::get('userID'), $houses)) {
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
            $this->updateCompleted(true);
            Router::redirectWithDomain("houses/" . $id);
        } else {
            $this->updateCompleted(false);
        }
    }


    public function destroy()
    {
        // TODO: Implement destroy() method.
    }


}