<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 14/12/2018
 * Time: 16:33
 */
namespace Model\DAO;
class RegisterDAO
{
    public static function checkExits($nombre, $apellido1, $apellido2, $dni, $tlf, $correo, $password, $fechaN)
    {
        include_once MODEL . "DAO/PersonaDAO.php";
        $persona = PersonaDAO::getBy('DNI', $dni);
        if ($persona != null) {
            header("Location: " . DOMAIN . "/register");
        } else {
            PersonaDAO::insert($nombre, $apellido1, $apellido2, $dni, $tlf, $correo, $password, $fechaN);
        }
    }
}