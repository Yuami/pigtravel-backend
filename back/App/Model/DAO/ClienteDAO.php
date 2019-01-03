<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 27/11/2018
 * Time: 18:47
 */
namespace Model\DAO;
class ClienteDAO extends DAO
{
    protected static $table = "cliente";
    protected static $class = "Cliente";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }

    public static function getByPersona($idPersona)
    {
        return parent::getById($idPersona);
    }

    public static function getAll()
    {
        return parent::getAll();
    }

    public static function deleteById($idPersona)
    {
        return parent::deleteById( $idPersona);
    }
}