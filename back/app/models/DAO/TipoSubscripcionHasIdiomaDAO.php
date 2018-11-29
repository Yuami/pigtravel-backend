<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 28/11/2018
 * Time: 9:12
 */

class TipoSubscripcionHasIdiomaDAO extends DAO
{
    protected static $table = "tipo_subscripcion_has_idioma";
    protected static $class = "TipoSubscripcionHasIdiomaDAO";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }
    public static function getByIdIdioma($idIdioma)
    {
        return parent::getBy("tipo_subscripcion_has_idioma", idIdioma, $idIdioma);
    }

    public static function deleteByIdIdioma($idIdioma)
    {
        return parent::deleteBy("tipo_subscripcion_has_idioma",idIdioma,$idIdioma);
    }
    public static function getByIdPremium($idPremium)
    {
        return parent::getBy("tipo_subscripcion_has_idioma", idPremium, $idPremium);
    }

    public static function deleteByIdPremium($idPremium)
    {
        return parent::deleteBy("tipo_subscripcion_has_idioma",idPremium,$idPremium);
    }
    public static function getByNombre($nombre)
    {
        return parent::getBy("tipo_subscripcion_has_idioma", nombre, $nombre);
    }
}