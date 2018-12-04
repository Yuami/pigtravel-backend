<?php

class Router {
    private $controller;
    private $params;

    public function __construct($controller, $params) {
        $this->controller = $controller;
        $this->params = $params;
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
}