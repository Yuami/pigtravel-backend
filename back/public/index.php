<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/basicVars.php";
spl_autoload_register(function($class) {
    $className = str_replace("\\", "/", $class);
    include_once APP . $className . '.php';
});
require_once CONFIG . "conf.php";
use Config\Router;
use Config\Session;
session_start();
if (isset($_SERVER['REDIRECT_URL'])) {
    $r = new Router($_SERVER['REDIRECT_URL'], $_SERVER['REQUEST_METHOD']);
} else {
    $r = new Router(DOMAIN . "main", []);
}
$c = $r->getController();

if (!Session::isSet('userID')) {
    if ($c != "register" && $c != "login" && $c != "loginController")
        header("Location: " . DOMAIN . "/login");
} else {
    if ($c == "register" || $c == "login"){
        header("Location: " . DOMAIN);
    }
}

$r->redirect();
