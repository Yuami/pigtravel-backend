<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:51
 */

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
        $stmt->bindValue(':passw', $password);
        $stmt->bindValue(':fechaN', $fechaN);
        $stmt->execute();
        $per = PersonaDAO::getByCorreo($correo)->getId();
        LoginController::log($per, $correo);
        header("Location: " . DOMAIN);
    }

    public static function register()
    {

    }

    public static function getByCorreo($correo)
    {
        $res = parent::getBy("correo", $correo);
        if (isset($res))
            return $res[0];
        return null;
    }
}