<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 16/11/2018
 * Time: 12:20
 */

class DAO extends PDO {

    private static $instance = null;

    /**
     * DAO constructor.
     */
    private function __construct() {
        $config = Config::singleton();
        $dsn = 'mysql:host=' . $config->get('dbhost') . ';dbname=' . $config->get('dbname');
        $user = $config->get('dbuser');
        $pass = $config->get('dbpass');
        parent::__construct($dsn, $user, $pass);
    }


}