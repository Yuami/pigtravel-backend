<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 28/01/2019
 * Time: 11:44
 */

namespace Controller;


use Config\Session;
use Model\DAO\LiniaPoliticaCancelacionDAO;
use Model\DAO\PoliticaCancelacionDAO;
use Model\DAO\ViviendaDAO;
use Routing\Router;

class PoliticasController extends Controller
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function store()
    {
        $id = $_POST['idH'];
        $p = PoliticaCancelacionDAO::insert([
            "nombre" => $_POST['nombre'],
            "idVendedor" => $_POST['idV']
        ]);
        $idP = $p->getId();
        LiniaPoliticaCancelacionDAO::insert([
            "id" => $idP,
            "idPoliticaCancelacion" => $idP,
            "dias" => $_POST['dias'],
            "porcentaje" => $_POST['porcentaje']
        ]);
        Router::redirect('houses/' . $id);

    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function show($id)
    {
        $politica = PoliticaCancelacionDAO::getById($id);
        $liniasP = LiniaPoliticaCancelacionDAO::getByIdPolitica($id);
        include_once VIEW . 'politicas.php';
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id)
    {
        $politica = PoliticaCancelacionDAO::getById($id);
        $liniasP = LiniaPoliticaCancelacionDAO::getByIdPolitica($id);
        LiniaPoliticaCancelacionDAO::update([
            "idPoliticaCancelacion" => $id,
            "dias" => $_POST['dias'],
            "porcentaje" => $_POST['porcentaje']
        ]);
        Router::redirect('politicas/' . $id);
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}