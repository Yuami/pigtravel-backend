<?php

class MensajesDAO extends DAO {
    protected static $table = "mensajes";
    protected static $class = "Mensajes";

    public static function insert() {
        // TODO: Implement insert() method.
    }

    public static function getByEnviado($idSender) {
        $res = parent::getBy("idSender", $idSender);
        if (isset($res))
            return $res[0];
        return null;
    }
    public static function getByLeido($leido) {
        $res = parent::getBy("leido", $leido);
        if (isset($res))
            return $res[0];
        return null;
    }
    public static function getByIdVivienda($idVivienda)
    {
        $res = parent::getBy("idVivienda", $idVivienda);
        if (isset($res))
            return $res;
        return null;
    }

    public static function getAll()
        {
            return parent::getAll();
        }
    }