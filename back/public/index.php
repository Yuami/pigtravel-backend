<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/basicVars.php";

use Routing\Router;
use Config\Session;

session_start();
$r = new Router($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

if (!Session::isSet('userID')) {
    if ($r->isNot("register") && $r->isNot("login") && $r->isNot("loginController"))
        header("Location: " . DOMAIN . "/login");
} else {
    if ($r->is('register') || $r->is('login')) {
        header("Location: " . DOMAIN);
    }
}

try {
    $r->routeToGod();
} catch (Exception $e) {
    $r->default();
}
