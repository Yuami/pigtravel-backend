<?php
/**
 * Created by PhpStorm.
 * User: JFornes
 * Date: 10/01/2019
 * Time: 17:42
 */

namespace Routing;


class Route
{
    private $route;
    private $controller;
    private $method;
    private $view;
    private $matches = [];

    public function __construct($route, $controller, $method, $view = false)
    {
        $this->route = preg_replace('#{id}#', '([\d]+)', $route);
        $this->route = preg_replace('#{[\w]+}#', '([\d\w]+)', $route);

        if (!$view) $controller = '\Controller\\' . $controller;
        $this->controller = str_replace('@', '::', $controller);
        $this->method = $method;
        $this->view = $view;
    }

    public function matches(string $route, string $method): bool
    {
        return $this->method == strtolower($method) && preg_match('#^' . $this->route . '/?$#', $route, $this->matches);
    }

    public function execute()
    {
        if (!$this->view)
            return call_user_func_array($this->controller, array_slice($this->matches, 1));
        else
            return include_once VIEW . $this->controller . '.php';
    }
}