<?php

class Router {
    private $controller;
    private $params;
    private $method;

    public function __construct($url, $method) {
        $params = explode("/", $url);
        $controller = $params[1];
        $params = array_splice($params, 2);

        $this->controller = $controller;
        $this->params = $params;
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getController() {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller) : void {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getParams() {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params) : void {
        $this->params = $params;
    }

    public function redirect() {
        switch ($this->getController()) {
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
            case "login":
                include_once VIEW . "login.php";
                break;
            case "register":
                include_once VIEW . "register.php";
                break;
            case "main":
            case "":
                include_once VIEW . "main.php";
                break;
            default:
                echo "<h1>404</h1><br><h2> PAGINA NO ENCONTRADA</h2>";
        }
    }
}