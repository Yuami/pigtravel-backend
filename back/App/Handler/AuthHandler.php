<?php

namespace Handler;
use Config\Session;
use Routing\Router;

class AuthHandler {

    public static function verifyVendedor($idVendedor)
    {
        $userID = Session::me();
        if ($idVendedor == NULL || $userID !== $idVendedor) {
            return false;
        }
        return true;
    }

    public static function setError($type)
    {
            Session::set("wrong" . $type, "true");
    }
}