<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:51
 */

class PersonaDAO extends DAO {
    protected static $table = "persona";
    protected static $class = "Persona";

    public static function insert() {
        // TODO: Implement insert() method.
    }

    public static function getByCorreo($correo) {
        $res = parent::getBy("correo", $correo);
        if (isset($res))
            return $res[0];
        return null;
    }
}