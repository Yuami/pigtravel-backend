<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:47
 */

class BloqueoDAO extends DAO
{
    protected static $table = "bloqueo";
    protected static $class = "Bloqueo";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }

    public static function getBloqueoById($id)
    {
        $stat = DB::conn()->prepare("SELECT fechaInicio,fechaFin FROM " . self::$table . " WHERE idCliente=:id");
        $stat->bindValue(":id", $id);
        $stat->execute();
        return $stat->fetchAll();
    }

    public static function setBloqueo($fechaF, $fechaI, $activo)
    {
        $stat = DB::conn()->prepare("INSERT INTO " . self::$table . "(`id`, `fechaInicio`, `fechaFin`, `activo`)
        VALUES (NULL, :fechaI, :fechaF, :activo)");
        $stat->execute(array(':fechaI' => $fechaI, ':fechaF' => $fechaF, ':activo' => $activo));
        return $stat->fetchAll();
    }
}