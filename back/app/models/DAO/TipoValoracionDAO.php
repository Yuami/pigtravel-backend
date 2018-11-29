<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 28/11/2018
 * Time: 9:37
 */
class TipoValoracionDAO extends DAO
{

    protected static $table = "tipo_valoracion";
    protected static $class = "Tipo_Valoracion";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }

    public static function getById($id)
    {
        return parent::getById($id);
    }

    public static function getAll()
    {
        return parent::getAll("tipo_valoracion");
    }

    public static function deleteById($id)
    {
        return parent::deleteById( $id);
    }
}
