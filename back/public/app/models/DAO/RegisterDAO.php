<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 14/12/2018
 * Time: 16:33
 */

class RegisterDAO
{
    public static function checkExits($nombre, $apellido1, $apellido2, $dni, $tlf, $correo, $password, $fechaN)
    {
        include_once MODEL . "DAO/PersonaDAO.php";
        $persona = PersonaDAO::getBy('DNI', $dni);
        if ($persona != null) {
            return false;
        } else {
            PersonaDAO::insert($nombre, $apellido1, $apellido2, $dni, $tlf, $correo, $password, $fechaN);
        }
    }
}