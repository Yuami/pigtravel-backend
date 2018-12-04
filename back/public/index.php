<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/basicVars.php";
require_once ROOT. "basicIncludes.php";

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