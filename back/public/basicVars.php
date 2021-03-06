<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$root = substr($root, -1) == "/" ? substr($root, 0,-1) : $root;
define("ROOT", $root . "/");
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
    $class = APP . $className . '.php';
    if (file_exists($class))
    include_once $class;
});


require_once BACK . 'vendor/autoload.php';
require_once CONFIG . "conf.php";
require_once CONFIG . "web.php";
require_once ROOT . "helpers.php";
