<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:52
 */

namespace Model\DAO;
class ViviendaHasServicioDAO extends DAO
{
    protected static $table = "vivienda_has_servicio";
    protected static $class = "ViviendaHasTarifa";

    public static function getByIdVivienda($id)
    {
        return parent::getBy('idVivienda', $id);
    }
}