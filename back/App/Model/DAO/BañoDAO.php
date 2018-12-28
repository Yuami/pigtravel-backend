<?php

namespace Model\DAO;

class BañoDAO extends DAO
{
    protected static $table = "baño";
    protected static $class = "Baño";

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
        return parent::getAll();
    }

    public static function getByServicioBaño($idServicioBaño)
    {
        return parent::getBy(idServicioBaño, $idServicioBaño);
    }

    public static function deleteByServicioBaño($idServicioBaño)
    {
        return parent::deleteBy(idServicioBaño, $idServicioBaño);

    }

}
