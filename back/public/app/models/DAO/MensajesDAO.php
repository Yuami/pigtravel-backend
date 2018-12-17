<?php

require_once MODEL . "Items/Mensajes.php";
require_once MODEL . "Items/Vivienda.php";
require_once MODEL . "DAO/ViviendaDAO.php";
require_once MODEL . "Items/Persona.php";
require_once MODEL . "DAO/PersonaDAO.php";
class MensajesDAO extends DAO {
    protected static $table = "mensajes";
    protected static $class = "Mensajes";

    public static function insert() {
        // TODO: Implement insert() method.
    }

    public static function getByEnviados($idSender) {
        $res = parent::getBy("idSender", $idSender);
        if (isset($res)&& $res!=null)
            return $res;
        return null;
    }
    public static function getByRecibidos($idReciever) {
        $res = parent::getBy("idReciever", $idReciever);
        if (isset($res)&& $res!=null)
            return $res;
        return null;
    }
    public static function getMensajes($idUsuari,$enviados,$leido) {
        if($enviados==true) {
            $res = parent::getBy("idReciever", $idUsuari);
            if (isset($res)&& $res!=null)
                return $res;
            return null;
        }
    }
    public static function getByLeido($leido) {
        $res = parent::getBy("leido", $leido);
        if (isset($res))
            return $res;
        return null;
    }
    public static function getByIdVivienda($idVivienda)
    {
        $res = parent::getBy("idVivienda", $idVivienda);
        if (isset($res) && $res!=null)
            return $res;
        return null;
    }

    public static function getAll()
        {
            return parent::getAll();
        }
    }