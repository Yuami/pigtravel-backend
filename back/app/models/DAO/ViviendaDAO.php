<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/back/app/models/Items/Vivienda.php";
include_once "DAO.php";

class ViviendaDAO extends DAO{
    protected static $table = "vivienda";
    protected static $class = "Vivienda";

    public static function insert() {
        // TODO: Implement insert() method.
    }


}
