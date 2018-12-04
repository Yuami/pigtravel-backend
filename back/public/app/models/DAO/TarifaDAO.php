<?php

class TarifaDAO extends DAO
{
    protected static $table = "tarifa";
    protected static $class = "Tarifa";

    public static function insert()
{
    // TODO: Implement insert() method.
}

    public static function getById($id)
    {
        return parent::getById("tarifa", $id);
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