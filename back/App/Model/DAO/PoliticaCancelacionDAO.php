<?php

namespace Model\DAO;
class PoliticaCancelacionDAO extends DAO
{
    protected static $table = "politicas_cancelacion";
    protected static $class = "PoliticaCancelacion";

    public static function getByNombre($nombre)
    {
        return parent::getBy('nombre', $nombre);
    }

    public static function getByIdVivienda($id)
    {
        return parent::getBy('idVivienda', $id);
    }
}