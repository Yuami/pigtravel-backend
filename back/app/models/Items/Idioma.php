<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 21/11/2018
 * Time: 9:17
 */

class Idioma
{
    private static $id;
    private static $nombre;

    /**
     * @return mixed
     */
    public static function getId()
    {
        return self::$id;
    }

    /**
     * @param mixed $id
     */
    public static function setId($id): void
    {
        self::$id = $id;
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