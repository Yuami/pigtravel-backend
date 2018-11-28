<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 27/11/2018
 * Time: 18:47
 */
include "DAO.php";
include_once ("../Items/Cliente.php");

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
        return parent::getById("cliente", $idPersona);
    }

    public static function getAll()
    {
        return parent::getAll("cliente");
    }

    public static function deleteById($idPersona)
    {
        return parent::deleteById("cliente", $idPersona);
    }
}