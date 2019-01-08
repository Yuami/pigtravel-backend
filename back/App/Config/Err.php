<?php
/**
 * Created by PhpStorm.
 * User: JFornes
 * Date: 04/12/2018
 * Time: 20:05
 */
namespace Config;

class Err
{
    private static $error = array();

    public static function set($errorKey, $errorMessage)
    {
        if (is_string($errorKey) && is_string($errorMessage))
            self::$error[$errorKey] = $errorMessage;
    }

    public static function getAll()
    {
        return self::$error;
    }

    public static function get($errorKey)
    {
        if (self::isSet($errorKey))
            return self::$error[$errorKey];
        return null;
    }

    public static function isSet($errorKey)
    {
        return isset(self::$error[$errorKey]);
    }

    public static function delete($errorKey)
    {
        if (self::isSet($errorKey))
            unset(self::$error[$errorKey]);
    }

    public static function reset()
    {
        self::$error = array();
    }
}