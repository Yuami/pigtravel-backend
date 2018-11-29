<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 28/11/2018
 * Time: 9:43
 */

class ValoracionViviendaDAO extends DAO
{
    protected static $table = "valoracion_vivienda";
    protected static $class = "Valoracion_Vivienda";

    public static function insert()
    {
        // TODO: Implement insert() method.
    }

    public static function getByIdPersona($idPersona)
    {
        return parent::getBy("valoracion_vivienda", idPersona, $idPersona);
    }

    public static function deleteByIdPersona($idPersona)
    {
        return parent::deleteBy("valoracion_vivienda", idPersona, $idPersona);
    }
}