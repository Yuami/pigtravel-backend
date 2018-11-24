<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 21/11/2018
 * Time: 8:38
 */
include_once __DIR__ . "/back/app/models/Items/Vivienda.php";
include_once "DAO.php";

class ViviendaDAO extends DAO{
    protected static $table = "vivienda";
    protected static $class = "Vivienda";

    public static function insert() {
        // TODO: Implement insert() method.
    }


}
