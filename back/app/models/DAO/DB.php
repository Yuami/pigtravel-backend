<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "back/app/config/Config.php";
class DB {
    private static $conn;

    private function __construct() {
        $config = Config::singleton();
        $dsn = 'mysql:host=' . $config->get('dbhost') . ';dbname=' . $config->get('dbname');
        $user = $config->get('dbuser');
        $pass = $config->get('dbpass');
        self::$conn = new PDO($dsn, $user, $pass);
    }

    /**
     * @return PDO
     */
    public static function conn(): PDO {
        if (!isset($conn))
            new self;
        return self::$conn;
    }

}