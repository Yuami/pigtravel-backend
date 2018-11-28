<?php
include "DAO.php";
include_once ("../Items/Baño.php");

class BañoDAO extends DAO {
    protected static $table = "baño";
    protected static $class = "Baño";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }
    public static function getById($id)
    {
        return parent::getById("baño", $id);
    }

    public static function getAll()
    {
        return parent::getAll("baño");
    }

    public static function deleteById($id)
    {
        return parent::deleteById("baño", $id);
    }

    public static function getByServicioBaño($idServicioBaño)
    {
        return parent::getBy("baño", idServicioBaño, $idServicioBaño);
    }

    public static function deleteByServicioBaño($idServicioBaño)
    {
        return parent::deleteBy("baño", idServicioBaño, $idServicioBaño);

    }

}
