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

class PersonaDAO extends DAO {
    protected static $table = "persona";
    protected static $class = "Persona";

    public static function checkExits($dni) {
        $persona = PersonaDAO::getBy('DNI', $dni);
        return $persona != null;
    }

    public static function modify(array $parameters) {
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

    public static function setVendedor($id) {
        $sql = "insert into vendedor_vivienda(`idPersona`) value (:id)";
        $stmt = DB::conn()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public static function getByCorreo($correo) {
        $res = parent::getBy("correo", $correo);
        if (isset($res))
            return $res[0];
        return null;
    }

    public static function me() {
        return PersonaDAO::getById(Session::me());
    }
}