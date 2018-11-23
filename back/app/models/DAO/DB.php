<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 22/11/2018
 * Time: 13:00
 */
require_once "../../config/Config.php";
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