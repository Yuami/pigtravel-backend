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

    public static function getAll()
    {
        return parent::getAll();
    }

    public static function deleteById($id)
    {
        return parent::deleteById( $id);
    }

    public static function getByFechaInicio($fechaInicio)
    {
        return parent::getBy(fechaInicio, $fechaInicio);
    }

    public static function getByFechaFin($fechaFin)
    {
        return parent::getBy( fechaFin, $fechaFin);
    }
    public static function getByGeneral($general)
    {
        return parent::getBy( general, $general);
    }
    public static function getByIdPoliticaCancelacion($idPoliticaCancelacion)
    {
        return parent::getBy(idPoliticaCancelacion, $idPoliticaCancelacion);
    }

    public static function deleteByIdPoliticaCancelacion($idPoliticaCancelacion)
    {
        return parent::deleteBy(idPoliticaCancelacion,$idPoliticaCancelacion);
    }

}