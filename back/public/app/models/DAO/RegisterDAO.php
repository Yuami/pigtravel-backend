<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 14/12/2018
 * Time: 16:33
 */

class Register
{
    public static function checkExits($nombre, $apellido1, $apellido2, $dni, $tlf, $correo, $password, $fechaN)
    {
        $persona = PersonaDAO::getBy('DNI', $dni);
        if ($persona == null) {
            PersonaDAO::insert($nombre, $apellido1, $apellido2, $dni, $tlf, $correo, $password, $fechaN);
        }
    }
}