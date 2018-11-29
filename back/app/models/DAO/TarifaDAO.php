<?php

class TarifaDAO extends DAO
{
    protected static $table = "tarifa";
    protected static $class = "Tarifa";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }

    public static function getAll()
    {
        return parent::getAll("tarifa");
    }

    public static function deleteById($id)
    {
        return parent::deleteById("tarifa", $id);
    }

    public static function getByFechaInicio($fechaInicio)
    {
        return parent::getBy("tarifa", fechaInicio, $fechaInicio);
    }

    public static function getByFechaFin($fechaFin)
    {
        return parent::getBy("tarifa", fechaFin, $fechaFin);
    }
    public static function getByGeneral($general)
    {
        return parent::getBy("tarifa", general, $general);
    }
    public static function getByIdPoliticaCancelacion($idPoliticaCancelacion)
    {
        return parent::getBy("tarifa", idPoliticaCancelacion, $idPoliticaCancelacion);
    }

    public static function deleteByIdPoliticaCancelacion($idPoliticaCancelacion)
    {
        return parent::deleteBy("tarifa",idPoliticaCancelacion,$idPoliticaCancelacion);
    }

}