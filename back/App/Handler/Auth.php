<?php

namespace Handler;
use Config\Session;
use Routing\Router;

class Auth {

    public static function verifyVendedor($idVendedor)
    {
        return !($idVendedor == NULL || Session::me() !== $idVendedor);
    }

    public static function setError($message)
    {
            Session::set("wrong", $message);
    }
}