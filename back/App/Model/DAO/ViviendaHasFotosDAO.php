<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:52
 */

namespace Model\DAO;

use Config\File;
use Model\Items\Foto;

class ViviendaHasFotosDAO extends DAO
{
    protected static $table = "vivienda_has_fotos";
    protected static $class = "ViviendaHasFotos";

    public static function getByVivienda($id)
    {
        return self::getBy('idVivienda', $id, true, 'posicion');
    }

    public static function getLastByVivienda($id)
    {
        $vivienda = self::getByVivienda($id);
        $len = sizeof($vivienda) - 1;
        if (isset($vivienda[$len]))
            return $vivienda[$len];
        return null;
    }

    public static function getFirstByVivienda($id)
    {
        $vivienda = self::getByVivienda($id);
        if (isset($vivienda[0]))
            return $vivienda[0];
        return null;
    }

    public static function getByFoto($id)
    {
        return self::getBy('idFoto', $id);
    }

    public static function getFotosByVivienda(int $id)
    {
        return self::getBy('idVivienda', $id, true, 'posicion');
    }

    public static function getMainFotoVivienda(int $id)
    {
        $res = self::getFotosByVivienda($id);
        if (isset($res[0])) {
            $photoPath = $res[0]->getFoto()->getPath();
            if (File::exists(ROOT . $photoPath))
                return $photoPath;
        }
        return Foto::defaultCasa();
    }
}