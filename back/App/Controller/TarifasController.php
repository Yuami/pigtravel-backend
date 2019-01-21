<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 15/01/2019
 * Time: 9:52
 */

namespace Controller;


use Config\Session;
use Model\DAO\TarifaDAO;
use Model\DAO\ViviendaDAO;
use Model\DAO\ViviendaHasTarifaDAO;
use Routing\Router;

class TarifasController extends Controller
{

    public function index()
    {
//        include_once VIEW . 'tarifas.php';
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store()
    {
        $idT = TarifaDAO::insert([
            "fechaInicio" => $_POST['fechaI'],
            "fechaFin" => $_POST['fechaF'],
            "precio" => $_POST['precio'],
            "general" => isset($_POST['general']),
            "idPoliticaCancelacion" => $_POST['idPC'],
        ]);
        ViviendaHasTarifaDAO::insert([
            "idVivienda" => $_POST['idVivienda'],
            "idTarifa" => $idT->getId()
        ]);
        Router::redirect('houses/' . $_POST['idVivienda']);

    }

    public function show($id)
    {
        $idU = Session::get('userID');
        $houses = ViviendaDAO::getByVendedor($idU);
        foreach ($houses as $h) {
            if ($h->getId() == $id) {
                $house = $h;
            }
        }
        $tarifas = TarifaDAO::getByIdVivienda($id);
        include_once VIEW . 'tarifas.php';
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}