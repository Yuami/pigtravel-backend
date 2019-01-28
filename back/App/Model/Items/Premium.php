<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 21/11/2018
 * Time: 9:17
 */
namespace Model\Items;

class Premium
{
    private static $fechaInicio;
    private static $fechaFin;
    private static $tipoPremium;
    private static $tiempoRenovacion;
    private static $precio;

    /**
     * @return mixed
     */
    public static function getFechaInicio()
    {
        return self::$fechaInicio;
    }

    /**
     * @param mixed $fechaInicio
     */
    public static function setFechaInicio($fechaInicio): void
    {
        self::$fechaInicio = $fechaInicio;
    }

    /**
     * @return mixed
     */
    public static function getFechaFin()
    {
        return self::$fechaFin;
    }

    /**
     * @param mixed $fechaFin
     */
    public static function setFechaFin($fechaFin): void
    {
        self::$fechaFin = $fechaFin;
    }

    /**
     * @return mixed
     */
    public static function getTipoPremium()
    {
        return self::$tipoPremium;
    }

    /**
     * @param mixed $tipoPremium
     */
    public static function setTipoPremium($tipoPremium): void
    {
        self::$tipoPremium = $tipoPremium;
    }

    /**
     * @return mixed
     */
    public static function getTiempoRenovacion()
    {
        return self::$tiempoRenovacion;
    }

    /**
     * @param mixed $tiempoRenovacion
     */
    public static function setTiempoRenovacion($tiempoRenovacion): void
    {
        self::$tiempoRenovacion = $tiempoRenovacion;
    }

    /**
     * @return mixed
     */
    public static function getPrecio()
    {
        return self::$precio;
    }

    /**
     * @param mixed $precio
     */
    public static function setPrecio($precio): void
    {
        self::$precio = $precio;
    }

}