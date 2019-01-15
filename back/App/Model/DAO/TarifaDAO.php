<?php

namespace Model\DAO;
class TarifaDAO extends DAO
{
    protected static $table = "tarifa";
    protected static $class = "Tarifa";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }

    public static function getByIdVivienda($id)
    {

    }

    public static function getByidTarifa($id)
    {
        return parent::getBy('id', $id);
    }
}