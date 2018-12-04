<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/basicVars.php";
require_once ROOT . "basicIncludes.php";

Session::start();
$controller = "";

if (isset($_SERVER['REDIRECT_URL'])) {
    $url = $_SERVER['REDIRECT_URL'];
    $method = $_SERVER['REQUEST_METHOD'];

    $params = explode("/", $url);
    $controller = $params[1];
    $params = array_splice($params, 2);
}

if (!Session::isSet('userID')) {
    var_dump(Session::get('userID'));
    $errors = Err::getAll();
    foreach ($errors as $key => $value){
        echo "Key: $key Value: $value";
    }
    $finalView = $controller == "register" ? "register.php" : "login.php";
    include_once VIEW . $finalView;
} else {
    $router = new Router($controller, $params);

    switch ($router->getController()) {
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
            include VIEW . "main.php";
    }
}
