<?php

namespace Controller;

use Config\Photo;
use Config\Session;
use Model\DAO\LoginDAO;
use Model\DAO\PersonaDAO;
use Routing\Router;

class ProfileController extends Controller
{
    public function index()
    {
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
        $userId = Session::get("userID");
        PersonaDAO::modify([
            "id" => $userId,
            "nombre" => $_POST["firstNameForm"],
            "apellido1" => $_POST["surnameForm"],
            "tlf" => $_POST["telephoneForm"],
            "correo" => $_POST["emailForm"],
            "descripcion" => $_POST['descriptionForm'],
        ]);

        $credentials = LoginDAO::credentials(PersonaDAO::getById($userId)->getCorreo());
        if (isset($_POST['passwordForm']) && password_verify($_POST['passwordForm'], $credentials["password"])) {
            if ($_POST['newPasswordForm'] === $_POST['confirmPasswordForm']) {
                PersonaDAO::changePassword([
                    "id" => $userId,
                    "password" => password_hash($_POST['newPasswordForm'], PASSWORD_ARGON2I)
                ]);
            }
        }

        Router::redirect("profile");
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}