<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:51
 */

namespace Model\DAO;
class TipoViviendaHasIdiomaDAO extends DAO
{
    protected static $table = "tipo_vivienda_has_idioma";
    protected static $class = "TipoViviendaHasIdioma";

    public static function getByIdVivienda($id)
    {
        return parent::getBy('idTipo_vivienda',$id);
    }
}