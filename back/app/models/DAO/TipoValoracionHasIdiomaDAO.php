<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 28/11/2018
 * Time: 9:12
 */

class TipoValoracionHasIdiomaDAO extends DAO
{
    protected static $table = "tipo_valoracion_has_idioma";
    protected static $class = "Tipo_Valoracion_Idioma";

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
        return parent::deleteBy(idIdioma,$idIdioma);
    }
    public static function getByIdTipoValoracion($idTipoValoracion)
    {
        return parent::getBy(idTipoValoracion, $idTipoValoracion);
    }

    public static function deleteByIdTipoValoracion($idTipoValoracion)
    {
        return parent::deleteBy(idTipoValoracion,$idTipoValoracion);
    }
    public static function getByNombre($nombre)
    {
        return parent::getBy(nombre, $nombre);
    }
}