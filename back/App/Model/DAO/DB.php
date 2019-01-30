<?php

namespace Model\DAO;

use Config\Config;
use Config\Err;
use PDO;
use Routing\Router;

class DB
{
    private static $conn;

    private function __construct()
    {
        $config = Config::singleton();
        $dsn = 'mysql:host=' . $config->get('dbhost') . ';dbname=' . $config->get('dbname');
        $user = $config->get('dbuser');
        $pass = $config->get('dbpass');
        try {
            self::$conn = new PDO($dsn, $user, $pass);
            self::$conn->exec("set names utf8");
        } catch (\Exception $e){
            Err::display('Problema al conectar con la base de datos! Intentalo más tarde!','500');
        }
    }

    /**
     * @return PDO
     */
    public static function conn(): PDO
    {
        if (!isset($conn))
            new self;
        return self::$conn;
    }

}