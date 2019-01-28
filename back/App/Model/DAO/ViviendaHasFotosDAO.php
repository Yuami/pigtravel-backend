<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:52
 */

namespace Model\DAO;
class ViviendaHasFotosDAO extends DAO
{
    protected static $table = "vivienda_has_fotos";
    protected static $class = "ViviendaHasFotos";

    public static function getFotosByVivienda(int $id)
    {
        return self::getBy('idVivienda', $id);
    }
}