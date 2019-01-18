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
        TarifaDAO::insert([
            "fechaInicio" => $_POST['fechaI'],
            "fechaFin" => $_POST['fechaF'],
            "precio" => $_POST['precio'],
            "general" => $_POST['general'],
            "idPoliticaCancelacion" => $_POST['idPC'],
        ]);

    }

    public function show($id)
    {
        $idU = Session::get('userID');
        $houses = ViviendaDAO::getByVendedor($idU);
        $house = $houses[0];
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