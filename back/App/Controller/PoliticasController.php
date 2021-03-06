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
use Model\DAO\TarifaDAO;
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
        if (isset($_POST['idH'])) {
            $idH = $_POST['idH'];
        } else {
            $idH = null;
        }
        if (isset($_POST['idP'])) {
            $idP = $_POST['idP'];
        } else {
            $idP = null;
        }
        if ($idH != null) {
            $p = PoliticaCancelacionDAO::insert([
                "nombre" => $_POST['nombre'],
                "idVivienda" => $idH
            ]);
        }
        if ($p != null) {
            $idP = $p->getId();
        }
        $ids = LiniaPoliticaCancelacionDAO::getIdsPoliticas();
        LiniaPoliticaCancelacionDAO::insert([
            "id" => (max($ids) + 1),
            "idPoliticaCancelacion" => $idP,
            "dias" => $_POST['dias'],
            "porcentaje" => $_POST['porcentaje']
        ]);

        if ($idH != null) {
            Router::redirect('houses/' . $idH . '#politicas');
        } else {
            Router::redirect('politicas/' . $p->getId());
        }

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
        $idL = $_POST['idL'];
        LiniaPoliticaCancelacionDAO::update([
            "idPoliticaCancelacion" => $id,
            "dias" => $_POST['dias'],
            "porcentaje" => $_POST['porcentaje']
        ], "id = $idL and idPoliticaCancelacion = $id");
        Router::redirect('politicas/' . $id);
    }

    public function destroy($id)
    {
        if ($_POST['idH'] != null) {
            TarifaDAO::update([
                "idPoliticaCancelacion" => null
            ], "idPoliticaCancelacion=$id");
            LiniaPoliticaCancelacionDAO::deleteByIdPolitica($id);
            PoliticaCancelacionDAO::deleteById($id);
            Router::redirect('houses/' . $_POST['idH'] . '#politicas');
        } else {
            $idL = $_POST['idL'];
            LiniaPoliticaCancelacionDAO::deleteById($idL);
            Router::redirect('politicas/' . $id);
        }
    }

    public function addLinia($id)
    {
        $linia = LiniaPoliticaCancelacionDAO::getLastByIdPolitica($id);
        LiniaPoliticaCancelacionDAO::insert(
            [
                "id" => $linia->getId() + 1,
                "idPoliticaCancelacion" => $id,
                "dias" => $_POST['dias'],
                "porcentaje" => $_POST['porcentaje']
            ]
        );
        Router::redirect('politicas/' . $id);
    }
}
