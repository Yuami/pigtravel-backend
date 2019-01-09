<?php

namespace Config;

use Controller\Controller;
use Controller\DummyController;
use Controller\HouseController;
use Controller\IndexController;
use Controller\MessagesController;
use Controller\ProfileController;
use Controller\RegisterController;
use Controller\ReservationController;
use Controller\SendMessagesController;

class Router {
    private $controller;
    private $params;
    private $method;

    public function __construct($url, $method) {
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

    private function methodSelection(Controller $c) {
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
                if (isset($_POST["_method"])) {
                    if ($_POST["_method"] == 'PUT' || $_POST["_method"] == 'PATCH') {
                        $c->update($params[0]);
                    } else if ($_POST["_method"] == 'DELETE') {
                        $c->destroy();
                    }
                } else {
                    $c->store();
                }
                break;
            default:
                $c->index();
                break;
        }
    }

    public static function redirect($route) {
        header("location: " . DOMAIN . "/" . $route);
    }

    public function load() {
        $controller = new DummyController();
        switch ($this->getController()) {
            case "houses":
                $controller = new HouseController();
                break;
            case "reservations":
                $controller = new ReservationController();
                break;
            case "profile":
            case "settings":
                $controller = new ProfileController();
                break;
            case "support":
                include_once VIEW . "support.php";
                break;
            case "messages":
                $controller = new MessagesController();
                break;
            case "messagesSent":
                $controller = new SendMessagesController();
                break;
            case "notifications":
                include_once VIEW . "notifications.php";
                break;
            case "premium":
                include_once VIEW . "premium.php";
                break;
            case "login":
                include_once VIEW . "login.php";
                break;
            case "logout":
                include_once VIEW . "logout.php";
                break;
            case "register":
                $controller = new RegisterController();
                break;
            case "main":
            case "":
                $controller = new IndexController();
                break;
            case "loginController":
                include_once INFO . "loginController.php";
                break;
            default:
                echo "<h1>404</h1><br><h2> PAGINA NO ENCONTRADA</h2>";
        }
        $this->methodSelection($controller);
    }
}