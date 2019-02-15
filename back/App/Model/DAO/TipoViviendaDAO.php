<?php

namespace Model\DAO;

class TipoViviendaDAO extends DAO
{
    protected static $table = "tipo_vivienda";
    protected static $class = "TipoVivienda";

    public static function insert()
    {
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
        return parent::deleteById($id);
    }
}