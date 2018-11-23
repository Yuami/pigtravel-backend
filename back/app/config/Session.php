<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 23/11/2018
 * Time: 9:44
 */

class Session {
    private static $session;

    public static function start() {
        self::$session = session_start();
    }

    public static function set($key, $value) {
            $_SESSION[$key] = $value;
    }

    public static function get($key) {
        if (self::isSet($key))
            return $_SESSION[$key];
        return null;
    }

    public static function delete($key) : bool {
        if (self::isSet($key)) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

    public static function isSet($key) {
        return isset($_SESSION[$key]);
    }

    public static function destroy() {
        session_destroy();
    }
}