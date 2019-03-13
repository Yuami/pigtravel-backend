<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 15/01/2019
 * Time: 9:52
 */

namespace Controller;


use Model\DAO\PoliticaCancelacionDAO;
use Model\DAO\TarifaDAO;
use Model\DAO\ViviendaDAO;
use Model\DAO\ViviendaHasTarifaDAO;
use Routing\Router;

class TarifasController extends Controller
{

    public function index()
    {
        // TODO: Implement create() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store($id)
    {

        $t = TarifaDAO::insert([
            "fechaInicio" => $_POST['fechaI'],
            "fechaFin" => $_POST['fechaF'],
            "precio" => $_POST['precio'],
            "general" => isset($_POST['general']),
            "idPoliticaCancelacion" => $_POST['idPC'],
        ]);

        ViviendaHasTarifaDAO::insert([
            "idVivienda" => $id,
            "idTarifa" => $t->getId()
        ]);
        Router::redirect('houses/' . $id);

    }

    public function show($id)
    {
        $tarifa = TarifaDAO::getById($id);
        $VHT = ViviendaHasTarifaDAO::getByIdTarifa($id);
        $house = ViviendaDAO::getById($VHT->getIdVivienda());
        $idV = $house->getId();
        $politicas = PoliticaCancelacionDAO::getByIdVivienda($idV);
        include_once VIEW . 'tarifas.php';
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id)
    {
        $tarifa = TarifaDAO::getById($id);
        $VHT = ViviendaHasTarifaDAO::getByIdTarifa($id);
        $house = ViviendaDAO::getById($VHT->getIdVivienda());
        $t = TarifaDAO::update([
            "fechaInicio" => $_POST['fechaI'],
            "fechaFin" => $_POST['fechaF'],
            "precio" => $_POST['precio'],
            "general" => isset($_POST['general']),
            "idPoliticaCancelacion" => $_POST['idPC'],
        ], "id=$id");
        Router::redirect('houses/' . $house->getId());

    }

    public function destroy($id)
    {
        $tarifa = TarifaDAO::getById($id);
        $VHT = ViviendaHasTarifaDAO::getByIdTarifa($id);
        $house = ViviendaDAO::getById($VHT->getIdVivienda());
        ViviendaHasTarifaDAO::deleteByIdTarifa($id);
        TarifaDAO::deleteById($id);
        Router::redirect('houses/' . $house->getId());
    }
}