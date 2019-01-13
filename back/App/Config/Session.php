<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 23/11/2018
 * Time: 9:44
 */

namespace Config;

class Session
{

    public static function set($key, $value)
    {
        if (is_string($key))
            $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (self::isSet($key))
            return $_SESSION[$key];
        return null;
    }

    public static function delete($key): bool
    {
        if (self::isSet($key)) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

    public static function isSet($key)
    {
        if (!is_string($key)) return false;
        return isset($_SESSION[$key]);
    }

    public static function destroy()
    {
        $_SESSION = null;
        session_destroy();
    }

    public static function me()
    {
        if (self::isSet('userID'))
            return self::get('userID');
        return false;
    }
}