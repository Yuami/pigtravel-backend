<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:52
 */

class ViviendaHasTarifaDAO extends DAO
{
    protected static $table = "ViviendaHasTarifa";
    protected static $class = "ViviendaHasTarifa";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }

    public static function getBy($column, $value)
    {
        return parent::getBy($column, $value); // TODO: Change the autogenerated stub
    }

    public static function deleteById($id)
    {
        parent::deleteById($id); // TODO: Change the autogenerated stub
    }

    public static function getById($id)
    {
        return parent::getById($id); // TODO: Change the autogenerated stub
    }
}