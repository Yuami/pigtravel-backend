<?php
// error_reporting(E_ALL);
// ini_set('display_errors', TRUE);
// ini_set('display_startup_errors', TRUE);

require_once $_SERVER['DOCUMENT_ROOT'] . "/basicVars.php";

use Routing\Router;
use Config\Session;

session_start();
$r = new Router($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

if (!Session::me()) {
    if ($r->isNot("register") && $r->isNot("login"))
        Router::redirect('login');
} else {
    if ($r->is('register') || $r->is('login')) {
        Router::redirectToDomain();
    }
}

try {
    $r->routeToGod();
} catch (Exception $e) {
    $r->default();
}
