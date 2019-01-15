<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:51
 */

namespace Model\DAO;

use Config\Session;
use Controller\LoginController;

class PersonaDAO extends DAO
{
    protected static $table = "persona";
    protected static $class = "Persona";

    public static function insert($nombre, $apellido1, $apellido2, $dni, $tlf, $correo, $password, $fechaN)
    {
        include_once CONTROLLER . "LoginController.php";
        // TODO: Implement insert() method.
        $sql = "INSERT INTO `persona` (`nombre`, `apellido1`, `apellido2`, `DNI`, `tlf`, `correo`, `password`, `fechaNacimiento`)
VALUES (:nombre, :apellido1, :apellido2, :dni, :tlf,:correo,:passw,:fechaN)";
        $stmt = DB::conn()->prepare($sql);
        $stmt->bindValue(':nombre', $nombre);
        $stmt->bindValue(':apellido1', $apellido1);
        $stmt->bindValue(':apellido2', $apellido2);
        $stmt->bindValue(':dni', $dni);
        $stmt->bindValue(':tlf', $tlf);
        $stmt->bindValue(':correo', $correo);
        $stmt->bindValue(':passw', password_hash($password, PASSWORD_ARGON2I));
        $stmt->bindValue(':fechaN', $fechaN);
        $stmt->execute();
        self::setVendedor(PersonaDAO::getByCorreo($correo)->getId());
        LoginController::login($correo, $password);
        header("Location: " . DOMAIN);
    }

    public static function modify(array $parameters)
    {
        $id = $parameters["id"];
        $nombre = $parameters["nombre"];
        $apellido1 = $parameters["apellido1"];
        $tlf = $parameters["tlf"];
        $correo = $parameters["correo"];
        $descripcion = $parameters["descripcion"];

        $sql = "UPDATE `persona` SET `nombre` = :nombre, `apellido1` = :apellido1, `tlf` = :tlf , 
                `correo` = :correo , `descripcion` = :descripcion where id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nombre', $nombre);
        $stmt->bindValue(':apellido1', $apellido1);
        $stmt->bindValue(':tlf', $tlf);
        $stmt->bindValue(':correo', $correo);
        $stmt->bindValue(':descripcion', $descripcion);
        $stmt->execute();
    }

    public static function changePassword(array $parameters)
    {
        $sql = "UPDATE `persona` SET `password` = :pass where id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->bindValue(':id', $parameters['id']);
        $stmt->bindValue(':pass', $parameters['password']);
        $stmt->execute();
    }

    public static function setVendedor($id)
    {
        $sql = "insert into vendedor_vivienda(`idPersona`) value (:id)";
        $stmt = DB::conn()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public static function getByCorreo($correo)
    {
        $res = parent::getBy("correo", $correo);
        if (isset($res))
            return $res[0];
        return null;
    }

    public static function me()
    {
        return PersonaDAO::getById(Session::me());
    }
}