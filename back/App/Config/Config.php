<?php
namespace Config;
class Config
{
    private $vars;
    private static $instance;

    private function __construct()
    {
        $this->vars = array();
    }

    public function set($name, $value)
    {
        if (!isset($this->vars[$name])) {
            $this->vars[$name] = $value;
        }
    }

    //Con get('nombre_de_la_variable') recuperamos un valor.
    public function get($name)
    {
        if (isset($this->vars[$name])) {
            return $this->vars[$name];
        }
    }

    public static function singleton() : Config
    {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }

    public static function errorsOn()
    {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }
}
/*
 Uso:

 $Config = Config::singleton();
 $Config->set('nombre', 'Federico');
 echo $Config->get('nombre');

 $config2 = Config::singleton();
 echo $config2->get('nombre');

*/