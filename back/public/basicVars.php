<?php
define("ROOT", $_SERVER['DOCUMENT_ROOT'] . "/");
define("BACK", ROOT . "../");
define("INFO", ROOT . "info/");
define("CALENDAR", ROOT . "calendarInclude.php");

define("APP", BACK . "App/");
define("ASSETS", BACK . "assets/");

define("CONFIG", APP . "Config/");
define("CONTROLLER", APP . "Controller/");
define("MODEL", APP . "Model/");
define("VIEW", APP . "View/");

define("UPLOADS", ASSETS . "uploads/");

define("ITEM", MODEL . "Items/");
define("DAO", MODEL . "DAO/");




define("PERFIL", "img/perfiles/");
define("DOMAIN", "http://" . $_SERVER['HTTP_HOST']);

spl_autoload_register(function($class) {
    $className = str_replace("\\", "/", $class);
    include_once APP . $className . '.php';
});

function dd($var){
    var_dump($var);
    die();
}

require_once CONFIG . "conf.php";
