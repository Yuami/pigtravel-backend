<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:52
 */

namespace Model\DAO;
class ViviendaHasTarifaDAO extends DAO
{
    protected static $table = "vivienda_has_tarifa";
    protected static $class = "ViviendaHasTarifa";

    public static function insert(array $parameters)
    {
        // TODO: Implement insert() method.
    }

    public static function getByIdVivienda($id)
    {
        return parent::getBy('idVivienda', $id);
    }
}