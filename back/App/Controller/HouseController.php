<?php

namespace Controller;

use Config\Cookie;
use Handler\Auth;
use Model\DAO\CitiesDAO;
use Model\DAO\LiniaPoliticaCancelacionDAO;
use Model\DAO\MensajesDAO;
use Model\DAO\PoliticaCancelacionDAO;
use Model\DAO\ServicioHasIdiomaDAO;
use Model\DAO\TarifaDAO;
use Model\DAO\TipoViviendaHasIdiomaDAO;
use Model\DAO\ViviendaHasServicioDAO;
use Model\Items\ServicioHasIdioma;
use Model\Items\TipoViviendaHasIdioma;
use PHPMailer\PHPMailer\Exception;
use Routing\Router;
use Config\Session;
use Model\DAO\ViviendaDAO;

class HouseController
{

    public static function validUser($id)
    {
        $v = ViviendaDAO::getById($id);
        if ($v == NULL || Session::me() != $v->getIdVendedor()) {
            Auth::setError("You do not have access to that house");
            Router::redirect("houses");
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
        $tipoVivienda = TipoViviendaHasIdiomaDAO::getBy('idIdioma', 2);
        $houses = ViviendaDAO::getById($id);
        $politicas = PoliticaCancelacionDAO::getByIdVivienda($id);
        $tarifas = TarifaDAO::getByIdVivienda($id);
        if (self::validUser($id)) {
            include_once VIEW . "house.php";
        }
    }

    public function create()
    {
        $servicios = ServicioHasIdiomaDAO::getAllOrdered("nombre");
        $tipoVivienda = TipoViviendaHasIdiomaDAO::getBy('idIdioma', 2);
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
            "idTipoVivienda" => $_POST['tipoVivienda'],
            "alquilerAutomatico" => isset($_POST['alquilerAutomatico']) ? 1 : 0,
            "idCiudad" => $_POST['city'],
            "idVendedor" => Session::get('userID'),
            "descripcion" => $_POST['description']
        ]);

        $uc = new UploadController();
        $uc->house($vivienda->getId());
        self::importServicios($vivienda);

        Router::redirect('houses/' . $vivienda->getId());
    }

    private static function importServicios($vivienda)
    {
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
    }

    public function edit($id)
    {
    }

    public function update($id)
    {

        if (self::validUser($id)) {
            try {
                ViviendaDAO::update([
                    "id" => $id,
                    "nombre" => $_POST['houseName'],
                    "capacidad" => $_POST['peopleAmount'],
                    "metrosCuadrados" => $_POST['squaremeters'],
                    "calle" => $_POST['street'],
                    "horaEntrada" => $_POST['checkIn'],
                    "horaSalida" => $_POST['checkOut'],
                    "alquilerAutomatico" => isset($_POST['alquilerAutomatico']) ? 1 : 0,
                    "idTipoVivienda" => $_POST['tipoVivienda'],
                    "idCiudad" => $_POST['city'],
                    "descripcion" => $_POST['description']], "id = $id");
                self::updateCompleted(true);
            } catch (Exception $e) {
                self::updateCompleted(false);
            }
            Router::redirect("houses/$id");
        }
    }


    public function destroy()
    {
    }


}