<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 22/11/2018
 * Time: 12:34
 */
namespace Model\DAO;
require_once MODEL . "Items/Empleado.php";

class EmpleadoDAO extends DAO{
    protected static $table = "empleado";
    protected static $class = "Empleado";
    public static function getByRol($rol) {

        $sql = "SELECT * FROM empleado WHERE idRol=:rol";
        $statement = DB::conn()->prepare($sql);
        $statement->bindValue(":rol", $rol);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, static::$class);
    }

}