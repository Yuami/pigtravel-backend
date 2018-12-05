<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 04/12/2018
 * Time: 16:17
 */

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
            Err::set("loginStatus", 'Wrong email or password!');
            return false;
        }
        Err::set("loginStatus", 'No data has been entered!');
        return false;
    }

    public static function login($correoPost, $passwordPost) : bool {
        session_start();
        if (self::isLoggable($correoPost, $passwordPost)) {
            Session::set("userID", $_POST['emailLogin']);
            return true;
        }
        return false;
    }
}