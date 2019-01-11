<?php

namespace Routing;

use Controller\Controller;
use Controller\DummyController;
use Controller\HouseController;
use Controller\IndexController;
use Controller\LoginController;
use Controller\MessagesController;
use Controller\ProfileController;
use Controller\RegisterController;
use Controller\ReservationController;
use Controller\SendMessagesController;
use Controller\UploadController;

/**
 * Class Router
 * @package Routing
 * @method static get ($url, $controller)
 * @method static post ($url, $controller)
 * @method static delete ($url, $controller)
 * @method static put ($url, $controller)
 * @method static patch ($url, $controller)
 * @method static view ($url, $view)
 */
class Router
{
    private static $methods = ['get', 'post', 'patch', 'put', 'delete'];
    private static $routes = [];
    private $route;
    private $method;

    public function __construct($url, $method)
    {
        $this->route = strtolower($url);
        $this->method = strtolower($method);
    }

    public function is(string $url)
    {
        $url = "/" . $url;
        return strtolower($url) == strtolower($this->route);
    }

    public function isNot(string $url)
    {
        return !$this->is($url);
    }

    public static function resource($name, $controller)
    {
        $url = '/' . $name;
        self::get($url, $controller . '@index');
        self::get($url . '/create', $controller . '@create');
        self::get($url . '/([\d\w]+)', $controller . '@show');
        self::get($url . '/([\d\w]+)/edit', $controller . '@edit');
        self::put($url . '/([\d\w]+)', $controller . '@update');
        self::patch($url . '/([\d\w]+)', $controller . '@update');
        self::delete($url . '/([\d\w]+)', $controller . '@destroy');
        self::post($url, $controller . '@store');
    }

    public static function __callStatic($name, $arguments)
    {
        if (in_array(strtolower($name), Router::$methods)) {
            self::addRoute($name, $arguments);
        }
        if ($name == 'view') {
            self::addRoute('get', $arguments, true);
        }
    }

    private static function addRoute($method, &$arguments, $view = false)
    {
        $route = $arguments[0];
        $c = $arguments[1];
        Router::$routes[] = new Route($route, $c, $method, $view);
    }

    /**
     * @throws \Exception
     */
    public function routeToGod()
    {
        foreach (self::$routes as $r) {
            if ($r->matches($this->route, $this->method)) {
                $r->execute();
                break;
            }
        }
        throw new \Exception('Not Found', 404);
    }

    public function default()
    {

    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params): void
    {
        $this->params = $params;
    }

    public static function back()
    {
        self::redirect($_SERVER['HTTP_REFERER']);
    }

    public static function redirectToDomain()
    {
        self::redirect(DOMAIN);
    }

    public static function redirect($route)
    {
        header("Location: $route");
        exit;
    }

    public static function redirectWithDomain($route)
    {
        self::redirect(DOMAIN . "/" . $route);
    }
}