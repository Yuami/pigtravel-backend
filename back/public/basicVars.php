<?php
define("ROOT", $_SERVER['DOCUMENT_ROOT'] . "/");
define("APP", ROOT . "../App/");
define("CONFIG", APP . "Config/");
define("CONTROLLER", APP . "Controller/");
define("MODEL", APP . "Model/");
define("ITEM", MODEL . "Items/");
define("DAO", MODEL . "DAO/");
define("VIEW", APP . "View/");
define("INFO", ROOT . "info/");

define("CALENDAR", ROOT . "calendarInclude.php");
define("DOMAIN", "http://" . $_SERVER['HTTP_HOST']);

define("PERFIL", "img/perfil/");

spl_autoload_register(function($class) {
    $className = str_replace("\\", "/", $class);
    include_once APP . $className . '.php';
});
require_once CONFIG . "conf.php";
