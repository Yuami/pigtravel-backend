<?php

namespace Routing;

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
    protected static $baseURL = '/';
    protected static $baseDir = '';

    private static $methods = ['get', 'post', 'patch', 'put', 'delete', 'view'];
    private static $routes = [];
    private $route;
    private $method;

    public function __construct($url, $method)
    {
        $this->method = $this->methodSelector($method);
        $this->route = strtolower($url);
        $this->method = strtolower($this->method);
    }

    public function methodSelector($method)
    {
        return isset($_POST['_method']) ? $_POST['_method'] : $method;
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
        $url = $name;
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
    }

    private static function addRoute($method, $arguments)
    {
        $route = static::$baseURL . $arguments[0];
        $c = static::$baseDir . $arguments[1];
        self::$routes[] = $method == 'view' ? Route::view($route, $c) : Route::new($route, $c, $method);
    }

    /**
     * @throws \Exception
     */
    public function routeToGod()
    {
        foreach (self::$routes as $r) {
            if ($r->matches($this->route, $this->method)) {
                return $r->execute();
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

    public static function back()
    {
        self::redirect($_SERVER['HTTP_REFERER']);
    }

    public static function redirectToDomain()
    {
        self::redirect(DOMAIN, false);
    }

    public static function redirect($route, $domain = true)
    {
        if ($domain)
            self::redirect(DOMAIN . "/" . $route, false);
        header("Location: $route");
        exit;
    }
}