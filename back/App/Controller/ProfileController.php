<?php
namespace Controller;

use Config\Router;
use Config\Session;
use Model\DAO\PersonaDAO;

class ProfileController extends Controller {
    public function index() {
        include_once VIEW . "profile.php";
    }

    public function show($id)
    {
        Router::redirect("profile");
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store()
    {
    }

    public function edit($id)
    {

    }

    public function update($id)
    {
        PersonaDAO::modify([
            "id" => Session::get("userID"),
            "nombre" => $_POST["firstNameForm"],
            "apellido1" => $_POST["surnameForm"],
            "tlf" => $_POST["telephoneForm"],
            "correo" => $_POST["emailForm"],
            "descripcion" => $_POST['descriptionForm'],
        ]);
        Router::redirect("profile");

    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}