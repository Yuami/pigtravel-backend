<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 18/12/2018
 * Time: 11:11
 */

class EstadoHasIdiomaDAO
{
    protected static $table = "estado_has_idioma";
    protected static $class = "EstadoHasIdioma";

    public static function getNombre($idEstado, $idIdioma = 1)  {
        $sql ="SELECT * FROM " . static::$table . " WHERE idEstado = :idEstado" . "and idIdioma = :idIdioma";
        $statement = DB::conn()->prepare($sql);
        $statement->bindValue(":idEstado", $idEstado);
        $statement->bindValue(":idIdioma", $idIdioma);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, static::$class);
    }
}