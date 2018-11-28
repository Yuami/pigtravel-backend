<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/back/app/models/Items/Vivienda.php";
include_once "DAO.php";

class ViviendaDAO extends DAO{
    protected static $table = "vivienda";
    protected static $class = "Vivienda";

    public static function insert() {
        // TODO: Implement insert() method.
    }

    public static function getByTipoVivienda($tipo)
    {
        return parent::getBy("idTipoVvienda", $tipo);
    }

    public static function getByAlquilerAutomatico($bool)
    {
        return parent::getBy("alquilerAutomatico", $bool);
    }

    public static function getByIDCiudad($id)
    {
        return parent::getBy("idCiudad", $id);
    }

    public static function getByDestacada($bool)
    {
        return parent::getBy("destacada", $bool);
    }

    public static function getByCapacidad($capacidad)
    {
        $statement = DB::conn()->prepare("SELECT ");
    }
}