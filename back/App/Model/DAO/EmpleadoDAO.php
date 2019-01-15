<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 22/11/2018
 * Time: 12:34
 */
namespace Model\DAO;
class EmpleadoDAO {
    public static function getByRol($rol) {
        $res = parent::getBy("idRol", $rol);
        if (isset($res))
            return $res;
        return null;
    }
}