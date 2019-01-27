<?php

namespace Handler;
use Config\Session;
use Routing\Router;

class AuthHandler {

    public static function verifyVendedor($idVendedor)
    {
        return !($idVendedor == NULL || Session::me() !== $idVendedor);
    }

    public static function setError($type)
    {
            Session::set("wrong" . $type, "true");
    }
}