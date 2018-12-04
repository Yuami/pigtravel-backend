<?php

define("ROOT", $_SERVER['DOCUMENT_ROOT'] . "/");
define("APP", ROOT . "app/");
define("CONFIG", APP . "config/");
define("CONTROLLER", APP . "controller/");
define("MODEL", APP . "models/");
define("VIEW", APP . "views/");
define("INFO", ROOT . "info/");
require_once CONFIG . "Config.php";
require_once CONFIG . "conf.php";
require_once CONFIG . "Err.php";
require_once CONFIG . "Cookie.php";
require_once CONFIG . "Router.php";
require_once CONFIG . "Session.php";

require_once MODEL . "DAO/DAO.php";
require_once MODEL . "DAO/DB.php";

Session::start();
$controller = "";
if (isset($_SERVER['REDIRECT_URL'])) {
    $url = $_SERVER['REDIRECT_URL'];
    $method = $_SERVER['REQUEST_METHOD'];

    $params = explode("/", $url);
    $controller = $params[1];
    $params = array_splice($params, 2);
} else {

}

if ($controller != "login" || $controller != "register") {
    if (!Session::isSet('userID')) {
        include VIEW . "login.php";
    }
} else if (!isset($_SERVER['REDIRECT_URL'])) {
    include VIEW . "main.php";
} else {
    $router = new Router($controller, $params);

    switch ($router->getController()) {
        case "":

            break;
        case "houses":
            require_once CONTROLLER . "HouseController.php";
            $controller = new HouseController();
            $controller->show();
            break;
        case "reservations":
            Router::controller($controller);

            break;
        case "":
            Router::controller($controller);

            break;
        default:
            echo "Error 404 pagina no encontrada";
    }

}