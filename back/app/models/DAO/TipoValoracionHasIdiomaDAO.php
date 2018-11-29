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
    protected static $class = "TipoValoracionHasIdiomaDAO";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }
    public static function getByIdIdioma($idIdioma)
    {
        return parent::getBy("tipo_valoracion_has_idioma", idIdioma, $idIdioma);
    }

    public static function deleteByIdIdioma($idIdioma)
    {
        return parent::deleteBy("tipo_valoracion_has_idioma",idIdioma,$idIdioma);
    }
    public static function getByIdTipoValoracion($idTipoValoracion)
    {
        return parent::getBy("tipo_valoracion_has_idioma", idTipoValoracion, $idTipoValoracion);
    }

    public static function deleteByIdTipoValoracion($idTipoValoracion)
    {
        return parent::deleteBy("tipo_valoracion_has_idioma",idTipoValoracion,$idTipoValoracion);
    }
    public static function getByNombre($nombre)
    {
        return parent::getBy("tipo_valoracion_has_idioma", nombre, $nombre);
    }
}