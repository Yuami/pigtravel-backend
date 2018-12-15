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

    public function redirect()
    {
        $params = $this->getParams();
        switch ($this->getController()) {
            case "houses":
                switch ($this->getMethod()) {
                    case "GET":
                        require_once CONTROLLER . "HouseController.php";
                        $controller = new HouseController();
                        if (!empty($params[0]) && $params[0] == "create") {
                            $controller->create();
                        } else if (!empty($params[0])) {
                            if ($params)
                                $controller->showHouse();
                            break;
                        } else {
                            $controller->index();
                        }
                }
                break;
            case "reservations":
                switch ($this->getMethod()) {
                    case "GET":
                        require_once CONTROLLER . "ReservationController.php";
                        $controller = new ReservationController();
                        if (!empty($params[0]) && empty($params[1])) {
                            $controller->showReservation();
                            break;
                        } else {
                            $controller->show();
                        }
                }
                break;
            case "profile":
            case "settings":
                include_once VIEW . "profile.php";
                break;
            case "support":
                include_once VIEW . "support.php";
                break;
            case "messages":
                switch ($this->getMethod()) {
                    case "GET":
                        require_once CONTROLLER . "MessagesController.php";
                        $controller = new MessagesController();
                        $controller->show();
                            break;

                }
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