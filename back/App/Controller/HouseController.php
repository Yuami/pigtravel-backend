<?php

namespace Controller;

use Config\Cookie;
use Model\DAO\CitiesDAO;
use Model\DAO\TarifaDAO;
use Routing\Router;
use Config\Session;
use Model\DAO\ViviendaDAO;
use Handler\AuthHandler;


class HouseController extends Controller
{

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
        $tarifas = TarifaDAO::getByIdVivienda($id);
        if ($houses && AuthHandler::verifyVendedor($houses->getIdVendedor())) {
            include_once VIEW . "house.php";
        } else {
            AuthHandler::setError("House");
            Router::redirect("houses");
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
        if ($houses && AuthHandler::verifyVendedor($houses->getIdVendedor(), "House")) {
            ViviendaDAO::update([
                "id" => $id,
                "nombre" => $_POST['houseName'],
                "capacidad" => $_POST['peopleAmount'],
                "metrosCuadrados" => $_POST['squaremeters'],
                "calle" => $_POST['street'],
                "horaEntrada" => $_POST['checkIn'],
                "horaSalida" => $_POST['checkOut'],
                "alquilerAutomatico" => $_POST['standardRate'],
                "idCiudad" => $_POST['city'],
                "descripcion" => $_POST['description']]);
            self::updateCompleted(true);
        } else {
            self::updateCompleted(false);
        }
        Router::redirect("houses/" . $id);
    }


    public function destroy()
    {
        // TODO: Implement destroy() method.
    }


}