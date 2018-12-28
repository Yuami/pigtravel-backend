<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 21/11/2018
 * Time: 9:17
 */
namespace Model\Items;

class EstadoHasIdioma
{

    private static $idIdioma;
    private static $idEstado;
    private static $nombre;

    /**
     * @return mixed
     */
    public static function getIdIdioma()
    {
        return self::$idIdioma;
    }

    /**
     * @param mixed $idIdioma
     */
    public static function setIdIdioma($idIdioma): void
    {
        self::$idIdioma = $idIdioma;
    }

    /**
     * @return mixed
     */
    public static function getIdEstado()
    {
        return self::$idEstado;
    }

    /**
     * @param mixed $idEstado
     */
    public static function setIdEstado($idEstado): void
    {
        self::$idEstado = $idEstado;
    }

    /**
     * @return mixed
     */
    public static function getNombre()
    {
        return self::$nombre;
    }

    /**
     * @param mixed $nombre
     */
    public static function setNombre($nombre): void
    {
        self::$nombre = $nombre;
    }


}