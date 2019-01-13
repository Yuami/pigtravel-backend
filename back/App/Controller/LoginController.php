<?php

namespace Controller;

use Config\Session;
use Model\DAO\LoginDAO;
use Model\DAO\PersonaDAO;
use Config\Cookie;
use Routing\Router;

class LoginController extends Controller
{
    public function index()
    {
        include_once VIEW . "login.php";
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store()
    {
        Cookie::set('lastEmail', $_POST['emailLogin'], 30);
        if (isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])) {
            LoginController::login($_POST['emailLogin'], $_POST['passwordLogin']);
        }
        header("Location: " . DOMAIN);
    }

    public function show($id)
    {
        // TODO: Implement show() method.
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
        session_destroy();
        Router::redirectToDomain();
    }

    public static function isLoggable($correoPost, $passwordPost): bool
    {
        $credentials = LoginDAO::credentials($correoPost);
        if (isset($credentials)) {
            if (password_verify($passwordPost, $credentials["password"])) {
                return true;
            }
            Session::set("loginStatus", 'Wrong email or password!');
            return false;
        }
        Session::set("loginStatus", 'No data has been entered!');
        return false;
    }

    public static function login($correoPost, $passwordPost): bool
    {
        if (self::isLoggable($correoPost, $passwordPost)) {
            $persona = PersonaDAO::getByCorreo($correoPost);
            // Session::set("user", serialize($persona));
            $userID = $persona->getId();
            self::log($userID, $correoPost);
            return true;
        }
        return false;
    }

    public static function log($userID, $email)
    {
        Session::set("userID", $userID);
        Session::set("email", $email);
    }
}