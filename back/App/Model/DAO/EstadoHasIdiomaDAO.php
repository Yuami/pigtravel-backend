<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 18/12/2018
 * Time: 11:11
 */
namespace Model\DAO;
use Model\Items\EstadoHasIdioma;

class EstadoHasIdiomaDAO extends DAO
{
    protected static $table = "estado_has_idioma";
    protected static $class = "EstadoHasIdioma";

    public static function getNombre($idEstado, $idIdioma = 2)  : EstadoHasIdioma {
        $sql ="SELECT * FROM estado_has_idioma WHERE idEstado = :idEstado and idIdioma = :idIdioma";
        $statement = DB::conn()->prepare($sql);
        $statement->bindValue(":idEstado", $idEstado);
        $statement->bindValue(":idIdioma", $idIdioma);
        $statement->execute();

        return parent::fetchOne($statement);
    }
}