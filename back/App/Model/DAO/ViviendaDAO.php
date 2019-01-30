<?php

namespace Model\DAO;

use PDO;

class ViviendaDAO extends DAO
{
    protected static $table = "vivienda";
    protected static $class = "Vivienda";

    public static function getByTipoVivienda($tipo)
    {
        return parent::getBy("idTipoVivienda", $tipo);
    }

    /**
     * @param $bool
     * @return array
     */
    public static function getByAlquilerAutomatico($bool)
    {
        return parent::getBy("alquilerAutomatico", $bool);
    }

    /**
     * @param $id
     * @return array
     */
    public static function getByIDCiudad($id)
    {
        return parent::getBy("idCiudad", $id);
    }

    public static function getByVendedor($idV)
    {
        return parent::getBy("idVendedor", $idV);
    }

    /**
     * @param $bool
     * @return array
     */
    public static function getByDestacada($bool)
    {
        return parent::getBy("destacada", $bool);
    }

    /**
     * @param $capacidad
     * @return array
     */
    public static function getByCapacidad($capacidad)
    {
        $statement = DB::conn()->prepare("SELECT * FROM vivienda where capacidad >= :capacidad");
        $statement->bindValue(":capacidad", $capacidad, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, self::$table);
    }
}