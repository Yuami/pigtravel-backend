<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 17/12/2018
 * Time: 8:39
 */

class RegisterController extends Controller
{
    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }

    public function index()
    {
        include_once VIEW . "register.php";
    }

    public function show()
    {
        $this->index();
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function store()
    {
        include_once DAO . "RegisterDAO.php";
        if (isset($_POST["nom"])) {
            $nom = $_POST["nom"];
        }
        if (isset($_POST["apellido1"])) {
            $apellido1 = $_POST["apellido1"];
        }
        if (isset($_POST["apellido2"])) {
            $apellido2 = $_POST["apellido2"];
        }
        if (isset($_POST["dni"])) {
            $dni = $_POST["dni"];
        }
        if (isset($_POST["telefono"])) {
            $tlf = $_POST["telefono"];
        }
        if (isset($_POST["fechaN"])) {
            $fN = $_POST["fechaN"];
        }
        if (isset($_POST["emailRegister"])) {
            $email = $_POST["emailRegister"];
        }
        if (isset($_POST["passw"])) {
            $passw = $_POST["passw"];
        }
        RegisterDAO::checkExits($nom, $apellido1, $apellido2, $dni, $tlf, $email, $passw, $fN);

    }

}