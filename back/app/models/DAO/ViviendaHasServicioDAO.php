<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 29/11/2018
 * Time: 12:33
 */

class ViviendaHasServicioDAO extends DAO
{
    protected static $table = "vivienda_has_servicio";
    protected static $class = "ViviendaHasServicio";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }

    public static function getByIdServicio($idServicio)
    {
        return parent::getBy(idServicio, $idServicio);
    }

    public static function deleteByIdServicio($idServicio)
    {
        return parent::deleteBy(idServicio, $idServicio);
    }
    public static function getByIdVivienda($idVivienda)
    {
        return parent::getBy(idVivienda, $idVivienda);
    }

    public static function deleteByIdVivienda($idVivienda)
    {
        return parent::deleteBy(idVivienda, $idVivienda);
    }
}