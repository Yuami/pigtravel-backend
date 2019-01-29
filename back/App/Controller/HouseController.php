<?php

namespace Controller;

use Config\Cookie;
use Model\DAO\CitiesDAO;
use Model\DAO\MensajesDAO;
use Model\DAO\ServicioHasIdiomaDAO;
use Model\DAO\TarifaDAO;
use Model\DAO\ViviendaHasServicioDAO;
use Model\Items\ServicioHasIdioma;
use Routing\Router;
use Config\Session;
use Model\DAO\ViviendaDAO;

class HouseController extends Controller
{

    public static function validUser($id)
    {
        $v = ViviendaDAO::getById($id);
        if ($v == NULL || Session::me() != $v->getIdVendedor()) {
            Session::set("wrongHouse", "true");
            Router::redirect("houses");
            return false;
        }
        return true;
    }

    public static function updateCompleted($completed)
    {
        Session::set("updateCompleted", $completed);
    }

    public function index()
    {
        $id = Session::get('userID');
        $mensajes = MensajesDAO::getBy('idReciever', $id);
        $houses = ViviendaDAO::getByVendedor($id);
        include_once VIEW . "houselist.php";
    }

    public function show($id)
    {
        $houses = ViviendaDAO::getById($id);
        $tarifas = TarifaDAO::getByIdVivienda($id);
        if (self::validUser($id)) {
            include_once VIEW . "house.php";
        }
    }

    public function create()
    {
        $servicios = ServicioHasIdiomaDAO::getAllOrdered("nombre");
        include_once VIEW . "houseAdd.php";
    }

    public function store()
    {
        $vivienda = ViviendaDAO::insert([
            "nombre" => $_POST['houseName'],
            "capacidad" => $_POST['peopleAmount'],
            "coordX" => $_POST['lan'],
            "coordY" => $_POST['lon'],
            "metrosCuadrados" => $_POST['squaremeters'],
            "calle" => $_POST['street'],
            "horaEntrada" => $_POST['checkIn'],
            "horaSalida" => $_POST['checkOut'],
            "idTipoVivienda" => 1,
            "idCiudad" => $_POST['city'],
            "idVendedor" => Session::get('userID'),
            "descripcion" => $_POST['description']]);

        if (isset($_POST['servicios'])) {
            $servicios = $_POST['servicios'];
            if (!empty($servicios)) {
                foreach ($servicios as $servicio)
                    if (ServicioHasIdiomaDAO::getBy('idServicio', $servicio) != null)
                        ViviendaHasServicioDAO::insert([
                            'idVivienda' => $vivienda->getId(),
                            'idServicio' => $servicio
                        ]);
            }
        }
        Router::redirect("houses");
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id)
    {
        if (self::validUser($id)) {
            ViviendaDAO::update([
                "nombre" => $_POST['houseName'],
                "capacidad" => $_POST['peopleAmount'],
                "metrosCuadrados" => $_POST['squaremeters'],
                "calle" => $_POST['street'],
                "horaEntrada" => $_POST['checkIn'],
                "horaSalida" => $_POST['checkOut'],
                "idTipoVivienda" => 1,
                "idCiudad" => $_POST['city'],
                "descripcion" => $_POST['description']], "id = $id");
            self::updateCompleted(true);
            Router::redirect("houses/$id");
        } else {
            self::updateCompleted(false);
        }
    }


    public function destroy()
    {
        // TODO: Implement destroy() method.
    }


}