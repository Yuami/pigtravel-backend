<?php

namespace Model\DAO;
class PoliticaCancelacionDAO extends DAO
{
    protected static $table = "politicas_cancelacion";
    protected static $class = "PoliticaCancelacion";

    public static function insert(array $parameters)
    {
        $nombre = $parameters["nombre"];
        $sql = "insert into politicas_cancelacion (nombre)
                values (:n)";
        $stm = DB::conn()->prepare($sql);
        $stm->bindValue(":n", $nombre);
        $stm->execute();
    }
}