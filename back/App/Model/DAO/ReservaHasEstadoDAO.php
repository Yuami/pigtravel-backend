<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 18/12/2018
 * Time: 11:04
 */
namespace Model\DAO;
use Model\Items\ReservaHasEstado;
use PDO;

class ReservaHasEstadoDAO extends DAO
{
    protected static $table = "reserva_has_estado";
    protected static $class = "ReservaHasEstado";

    public static function getByIdReserva($id)
    {
        return parent::getBy("idReserva", $id, true, "fechaCambio");
    }

    public static function getLastEstado($id) : ReservaHasEstado
    {
        $sql = "SELECT * FROM reserva_has_estado WHERE idReserva = :value order by fechaCambio desc limit 1";
        $statement = DB::conn()->prepare($sql);
        $statement->bindValue(":value", $id);
        $statement->execute();

        return parent::fetchOne($statement);
    }
}