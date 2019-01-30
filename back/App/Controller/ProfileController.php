<?php

namespace Controller;

use Config\Photo;
use Config\Session;
use Model\DAO\LoginDAO;
use Model\DAO\PersonaDAO;
use Routing\Router;

class ProfileController
{
    public function index()
    {
        $user = PersonaDAO::me();
        include_once VIEW . "profile.php";
    }

    public function show($id)
    {
        Router::redirect('profile');
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {
        $userId = Session::me();
        PersonaDAO::update([
            "nombre" => $_POST["firstNameForm"],
            "apellido1" => $_POST["surnameForm"],
            "tlf" => $_POST["telephoneForm"],
            "correo" => $_POST["emailForm"],
            "descripcion" => $_POST['descriptionForm'],
        ],'id = ' . $userId);

        $credentials = LoginDAO::credentials(PersonaDAO::getById($userId)->getCorreo());
        if (isset($_POST['passwordForm']) && password_verify($_POST['passwordForm'], $credentials["password"])) {
            if ($_POST['newPasswordForm'] === $_POST['confirmPasswordForm']) {
                PersonaDAO::update([
                    "password" => password_hash($_POST['newPasswordForm'], PASSWORD_ARGON2I)
                ],"id = $userId");
            }
        }
        $uC = new UploadController();
        $uC->profile($id);

        Router::redirect("profile");
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}