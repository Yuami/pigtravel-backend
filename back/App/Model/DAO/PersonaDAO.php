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
use Model\Items\Vendedor;

class PersonaDAO extends DAO {
    protected static $table = "persona";
    protected static $class = "Persona";

    public static function checkExits($dni) {
        $persona = PersonaDAO::getBy('DNI', $dni);
        return $persona != null;
    }

    public static function setVendedor($id) : Vendedor {
       return VendedorDAO::insert([
            "idPersona" => $id
        ]);
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