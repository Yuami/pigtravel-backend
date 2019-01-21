<?php
/**
 * Created by PhpStorm.
 * User: jansu
 * Date: 10/01/19
 * Time: 12:45
 */

namespace Controller;
use Config\Session;
use Model\DAO\EmpleadoDAO;
use Model\DAO\PersonaDAO;
use Model\DAO\MensajesDAO;


class SupportController extends Controller
{

    public function show($id) {

    }

    public function index() {
        $id = Session::get('userID');
        $persona = PersonaDAO::getById($id);
        include_once VIEW . 'support.php';
    }


    public function create() {
        // TODO: Implement create() method.
    }

    public function store() {


        MensajesDAO::insert([
            "idReciever" => 4,
            "idVivienda" => 7,
            "mensaje" => $_POST['comment']]);
        MensajesDAO::insert([
            "idReciever" => 7,
            "idVivienda" => 7,
            "mensaje" => $_POST['comment']]);
        header("Location: " . DOMAIN . "/support");

//        $to = 'admin@admin.com';
//        $subject = 'the subject';
//        $message = $_POST["comment"];
//        $headers = 'From: '.$_POST["mail"].'' . "\r\n" .
//            'Reply-To: '.$to.'' . "\r\n" .
//            'X-Mailer: PHP/' . phpversion();
//
//        mail($to, $subject, $message, $headers);
//        header('Location: ' . DOMAIN. ('/'));
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