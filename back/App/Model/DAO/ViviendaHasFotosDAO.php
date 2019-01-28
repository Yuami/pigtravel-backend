<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:52
 */

namespace Model\DAO;
use Model\Items\Foto;

class ViviendaHasFotosDAO extends DAO
{
    protected static $table = "vivienda_has_fotos";
    protected static $class = "ViviendaHasFotos";

    public static function getFotosByVivienda(int $id)
    {
        return self::getBy('idVivienda', $id, true,'posicion');
    }

    public static function getMainFotoVivienda(int $id)
    {
        $res = self::getFotosByVivienda($id);
        return isset($res[0]) ? $res[0]->getFoto()->getPath() : Foto::defaultCasa();
    }
}