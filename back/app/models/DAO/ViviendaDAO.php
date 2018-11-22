<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 21/11/2018
 * Time: 8:38
 */
include "../Items/Vivienda.php";
include "DAO.php";

class ViviendaDAO extends DAO{
    protected static $table = "vivienda";
    protected static $class = "Vivienda";
}
