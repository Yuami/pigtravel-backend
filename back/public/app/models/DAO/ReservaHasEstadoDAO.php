<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 18/12/2018
 * Time: 11:04
 */

class ReservaHasEstadoDAO extends DAO
{
    protected static $table = "reserva_has_estado";
    protected static $class = "ReservaHasEstado";

    public static function getByIdReserva($id)
    {
        return parent::getBy("idReserva", $id);
    }
}