<?php

include_once MODEL . "DAO/LoginDAO.php";

class LoginController {
    public static function isLoggable($correoPost, $passwordPost) : bool {
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

    public static function login($correoPost, $passwordPost) : bool {
        session_start();
        if (self::isLoggable($correoPost, $passwordPost)) {
            Session::set("user", serialize(PersonaDAO::getByCorreo($correoPost)));
            $userID = PersonaDAO::getByCorreo($correoPost)->getId();
            self::log($userID, $correoPost);
            return true;
        }
        return false;
    }

    public static function log($userID, $email) {
        Session::set("userID",$userID);
        Session::set("email", $email);
    }
}