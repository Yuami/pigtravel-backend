<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 21/11/2018
 * Time: 9:18
 */
namespace Model\Items;

class ServicioBañoHasIdioma
{
    private static $idIdioma;
    private static $idServicioBaño;

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
    public static function getIdServicioBaño()
    {
        return self::$idServicioBaño;
    }

    /**
     * @param mixed $idServicioBaño
     */
    public static function setIdServicioBaño($idServicioBaño): void
    {
        self::$idServicioBaño = $idServicioBaño;
    }


}