<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:51
 */
namespace Model\DAO;
class TipoCamaDAO extends DAO
{
    protected static $table = "TipoCama";
    protected static $class = "TipoCama";

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