<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 04/12/2018
 * Time: 16:17
 */

include_once MODEL . "DAO/LoginDAO.php";

class LoginController
{
    public static function isLoggable(): bool
    {
        if (isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])) {
            $correoPost = $_POST['emailLogin'];
            $passwordPost = $_POST['passwordLogin'];

            $credentials = LoginDAO::credentials($correoPost);
            $correo = $credentials["correo"];
            $password = $credentials["password"];

            if ($correo == $correoPost && $passwordPost == $password) {
                return true;
            }
            Err::set(loginStatus, 'Wrong email or password!');
            return false;
        }
        Err::set(loginStatus, 'No data has been entered!');
        return false;
    }

    public static function login(){
        Session::start();
        if (self::isLoggable()) {
            Session::set("userID", $_POST['emailLogin']);
        }
    }
}