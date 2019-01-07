<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 23/11/2018
 * Time: 13:47
 */
namespace Config;

class Cookie {

    public static function get($key) {
        if (self::isSet($key)){
            return $_COOKIE[$key];
        }
        return false;
    }

    public static function isSet($key) {
        return isset($_COOKIE[$key]);
    }

    public static function set($key, $value, $timeInDays) {
        $timeToDays = time() + $timeInDays * 24 * 60 * 60;
        setcookie($key, $value, $timeToDays, "/");
    }

    public static function delete($key) {
        if (self::isSet($key)){
            unset($_COOKIE[$key]);
        }
    }
}