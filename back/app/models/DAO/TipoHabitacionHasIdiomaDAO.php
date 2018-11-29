<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 28/11/2018
 * Time: 9:12
 */

class TipoHabitacionHasIdiomaDAO extends DAO
{
    protected static $table = "TipoHabitacionHasIdioma";
    protected static $class = "TipoHabitacionHasIdioma";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }
    public static function getByIdIdioma($idIdioma)
    {
        return parent::getBy("tipo_habitacion_has_idioma", idIdioma, $idIdioma);
    }

    public static function deleteByIdIdioma($idIdioma)
    {
        return parent::deleteBy("tipo_habitacion_has_idioma",idIdioma,$idIdioma);
    }
    public static function getByIdTipoHabitacion($idTipo_habitacion)
    {
        return parent::getBy("tipo_habitacion_has_idioma", idTipo_habitacion, $idTipo_habitacion);
    }

    public static function deleteByIdTipoHabitacion($idTipo_habitacion)
    {
        return parent::deleteBy("tipo_habitacion_has_idioma",idTipo_habitacion,$idTipo_habitacion);
    }
    public static function getByNombre($nombre)
    {
        return parent::getBy("tipo_habitacion_has_idioma", nombre, $nombre);
    }
}