<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 27/11/2018
 * Time: 19:07
 */

include "DAO.php";
include_once("../Items/Pais.php");

class ServicioDAO extends DAO
{

    protected static $table = "servicio";
    protected static $class = "Servicio";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }

    public static function getById($id)
    {
        return parent::getById("servicio", $id);
    }

    public static function getAll()
    {
        return parent::getAll("servicio");
    }

    public static function deleteById($id)
    {
        return parent::deleteById("servicio", $id);
    }
}
