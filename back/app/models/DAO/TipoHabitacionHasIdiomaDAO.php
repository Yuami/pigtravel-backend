<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 28/11/2018
 * Time: 9:12
 */

class TipoHabitacionHasIdiomaDAO extends DAO
{
    protected static $table = "tipo_habitacion_has_idioma";
    protected static $class = "Tipo_Habitacion_Idioma";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }
    public static function getByIdIdioma($idIdioma)
    {
        return parent::getBy(idIdioma, $idIdioma);
    }

    public static function deleteByIdIdioma($idIdioma)
    {
        return parent::deleteBy(idIdioma, $idIdioma);
    }
    public static function getByIdTipoHabitacion($idTipo_habitacion)
    {
        return parent::getBy( idTipo_habitacion, $idTipo_habitacion);
    }

    public static function deleteByIdTipoHabitacion($idTipo_habitacion)
    {
        return parent::deleteBy(idTipo_habitacion,$idTipo_habitacion);
    }
    public static function getByNombre($nombre)
    {
        return parent::getBy( nombre, $nombre);
    }
}