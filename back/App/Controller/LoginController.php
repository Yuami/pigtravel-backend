<?php

namespace Controller;

use Config\Session;
use Model\DAO\LoginDAO;
use Model\DAO\PersonaDAO;

class LoginController
{
    public static function isLoggable($correoPost, $passwordPost): bool
    {
        $credentials = LoginDAO::credentials($correoPost);
        if (isset($credentials)) {
            $correo = $credentials["correo"];
            $password = $credentials["password"];
            if ($correo == $correoPost && $passwordPost == $password) {
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