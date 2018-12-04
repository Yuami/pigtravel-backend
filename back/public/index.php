<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/basicVars.php";
require_once ROOT . "basicIncludes.php";

session_start();
$controller = "";

if (isset($_SERVER['REDIRECT_URL'])) {
    $url = $_SERVER['REDIRECT_URL'];
    $method = $_SERVER['REQUEST_METHOD'];

    $params = explode("/", $url);
    $controller = $params[1];
    $params = array_splice($params, 2);
}

if (!Session::isSet('userID')) {
    $finalView = $controller == "register" ? "register.php" : "login.php";
    include_once VIEW . $finalView;
} else {
    if (isset($_SERVER['REDIRECT_URL']))
        $router = new Router($controller, $params);
    else
        $router = new Router("main", []);
        switch ($router->getController()) {
            case "houses":
                require_once CONTROLLER . "HouseController.php";
                $controller = new HouseController();
                $controller->show();
                break;
            case "reservations":
                include_once VIEW . "reservations.php";
                break;
            case "support":
                include_once VIEW . "support.php";
                break;
            case "messages":
                include_once VIEW . "messages.php";
                break;
            case "notifications":
                include_once VIEW . "notifications.php";
                break;
            case "main":
                include_once VIEW . "main.php";
                break;
            default:
                echo "<h1>404</h1><br><h2> PAGINA NO ENCONTRADA</h2>";
        }
}
