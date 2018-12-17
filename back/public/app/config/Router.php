<?php

class Router
{
    private $controller;
    private $params;
    private $method;

    public function __construct($url, $method)
    {
        $params = explode("/", $url);
        $controller = $params[1];
        $params = array_splice($params, 2);
        $this->controller = $controller;
        if (isset($params))
            $this->params = $params;
        else
            $this->params = [];
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params): void
    {
        $this->params = $params;
    }

    private function methodSelection(Controller $c)
    {
        $params = $this->getParams();
        switch ($this->getMethod()) {
            case "GET":
                if (!empty($params[0]) && $params[0] == "create") {
                    $c->create();
                } else if (!empty($params[1]) && $params[1] == "edit") {
                    $c->edit($params[0]);
                } else if (!empty($params[0])) {
                    $c->show($params[0]);
                } else {
                    $c->index();
                }
                break;
            case "POST":
                $c->store();
                break;
            case "PUT":
            case "PATCH":
                $c->update($params[0]);
                break;
            case "DELETE":
                $c->destroy();
        }
    }

    public function redirect()
    {
        require_once CONTROLLER . "DummyController.php";
        $controller = new DummyController();
        switch ($this->getController()) {
            case "houses":
                require_once CONTROLLER . "HouseController.php";
                $controller = new HouseController();
                break;
            case "reservations":
                require_once CONTROLLER . "ReservationController.php";
                $controller = new ReservationController();
                break;
            case "profile":
            case "settings":
                include_once VIEW . "profile.php";
                break;
            case "support":
                include_once VIEW . "support.php";
                break;
            case "messages":
                require_once CONTROLLER . "MessagesController.php";
                $controller = new MessagesController();
                break;
            case "notifications":
                include_once VIEW . "notifications.php";
                break;
            case "login":
                include_once VIEW . "login.php";
                break;
            case "logout":
                include_once VIEW . "logout.php";
                break;
            case "register":
                require_once CONTROLLER . "RegisterController.php";
                $controller = new RegisterController();
                break;
            case "main":
            case "":
                include_once VIEW . "main.php";
                break;
            default:
                echo "<h1>404</h1><br><h2> PAGINA NO ENCONTRADA</h2>";
        }
        $this->methodSelection($controller);
    }
}