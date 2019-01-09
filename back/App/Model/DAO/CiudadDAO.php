<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 27/11/2018
 * Time: 18:47
 */
namespace Model\DAO;
class CiudadDAO extends DAO{
  protected static $table = "ciudad";
    protected static $class = "Ciudad";

    public static function insert()
{
    // TODO: Implement insert() method.
}
    public static function getById($id)
{
    return parent::getById( $id);
}

    public static function getAll()
{
    return parent::getAll();
}

    public static function deleteById($id)
{
    return parent::deleteById( $id);
}

    public static function getByPais($idPais)
{
    return parent::getBy( idPais, $idPais);
}

    public static function deleteByPais($idPais)
{
    return parent::deleteBy( $idPais, $idPais);

}

}