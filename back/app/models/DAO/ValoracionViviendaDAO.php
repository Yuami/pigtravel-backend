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
        return parent::getBy( idPersona, $idPersona);
    }

    public static function deleteByIdPersona($idPersona)
    {
        return parent::deleteBy(idPersona, $idPersona);
    }
    public static function getByIdVivienda($idVivienda)
    {
        return parent::getBy(idVivienda, $idVivienda);
    }

    public static function deleteByIdVivienda($idVivienda)
    {
        return parent::deleteBy(idVivienda, $idVivienda);
    }
}