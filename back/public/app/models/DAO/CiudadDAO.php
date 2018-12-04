<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 27/11/2018
 * Time: 18:47
 */
include "DAO.php";
include_once("../Items/Ciudad.php");

class CiudadDAO extends DAO{
  protected static $table = "ciudad";
    protected static $class = "Ciudad";

    public static function insert()
{
    // TODO: Implement insert() method.
}
    public static function getById($id)
{
    return parent::getById("ciudad", $id);
}

    public static function getAll()
{
    return parent::getAll("ciudad");
}

    public static function deleteById($id)
{
    return parent::deleteById("baño", $id);
}

    public static function getByPais($idPais)
{
    return parent::getBy("ciudad", idPais, $idPais);
}

    public static function deleteByPais($idPais)
{
    return parent::deleteBy("ciudad", $idPais, $idPais);

}

}