<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 04/12/2018
 * Time: 15:12
 */
namespace Controller;

use Config\Session;
use Model\DAO\MensajesDAO;
use Model\DAO\PersonaDAO;
use Model\DAO\ReservaDAO;


class IndexController extends Controller {
    public function show($id) {
        require_once VIEW . 'main.php';
    }

    public function index() {
        $id = Session::get('userID');
        $persona = PersonaDAO::getById($id);
        $reservas = ReservaDAO::getByVendedor($id);
        $mensajes = MensajesDAO::getBy('idSender',$id);
        include_once VIEW . 'main.php';
    }


    public function create() {
        // TODO: Implement create() method.
    }

    public function store() {
        // TODO: Implement store() method.
    }

    public function edit($id) {
        // TODO: Implement edit() method.
    }

    public function update($id) {
        // TODO: Implement update() method.
    }

    public function destroy() {
        // TODO: Implement destroy() method.
    }


}