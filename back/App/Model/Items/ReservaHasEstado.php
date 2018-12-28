<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 21/11/2018
 * Time: 9:18
 */
namespace Model\Items;

class ReservaHasEstado
{
    private static $estadoReserva;


    public static function getEstadoReserva()
    {
        return self::$estadoReserva;
    }


    public static function setEstadoReserva($estadoReserva): void
    {
        self::$estadoReserva = $estadoReserva;
    }


}