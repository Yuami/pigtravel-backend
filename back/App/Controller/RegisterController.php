<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 17/12/2018
 * Time: 8:39
 */

namespace Controller;

use Model\DAO\PersonaDAO;
use Model\Items\Persona;
use Routing\Router;

class RegisterController extends Controller {
    public function edit($id) {
    }

    public function create() {
    }

    public function destroy() {
    }

    public function index() {
        include_once VIEW . "register.php";
    }

    public function show($id) {

    }

    public function update($id) {
    }

    public function store() {
        if (isset($_POST["nom"]) &&
            isset($_POST["apellido1"]) &&
            isset($_POST["dni"]) &&
            isset($_POST["telefono"]) &&
            isset($_POST["fechaN"]) &&
            isset($_POST["emailRegister"]) &&
            isset($_POST["passw"])) {

            $dni = $_POST["dni"];
            $correo = $_POST["emailRegister"];
            $password = password_hash($_POST["passw"], PASSWORD_ARGON2I);
            $params = [
                'nombre' => $_POST["nom"],
                'apellido1' => $_POST["apellido1"],
                'apellido2' => isset($_POST["apellido2"]) ? $_POST["apellido2"] : null,
                'DNI' => $dni,
                'tlf' => $_POST["telefono"],
                'fechaNacimiento' => $_POST["fechaN"],
                'correo' => $correo,
                'password' => $password
            ];

            PersonaDAO::checkExits($dni);
            $p = PersonaDAO::insert($params);

            if ($p instanceof Persona) {
                PersonaDAO::setVendedor($p->getId());
                LoginController::login($correo, $password);
            }
            Router::redirectToDomain();
        } else {
            Router::redirect('/register');
        }
    }
}