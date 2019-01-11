<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 27/11/2018
 * Time: 18:47
 */

namespace Model\DAO;
use PDO;

class CiudadDAO extends DAO
{
    protected static $table = "cities";
    protected static $class = "Ciudad";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }

    public static function getById($id)
    {
        return parent::getById($id);
    }

    public static function getByIdRegion($id){
        $statement = DB::conn()->prepare("SELECT * FROM " . self::$table . " WHERE region_id = :id");
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        return self::fetchAll($statement);
    }

    public static function getAll()
    {
        return parent::getAll();
    }

    public static function deleteById($id)
    {
        return parent::deleteById($id);
    }

    public static function getByPais($idPais)
    {
        return parent::getBy(idPais, $idPais);
    }

    public static function deleteByPais($idPais)
    {
        return parent::deleteBy($idPais, $idPais);

    }

}