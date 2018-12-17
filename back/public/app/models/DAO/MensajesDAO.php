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
    public static function getByRecibidosIdVivienda($leido)
    {
        $sql = "SELECT * FROM mensajes WHERE leido :value and idReciever=".$_SESSION['userID'];
        $statement = DB::conn()->prepare($sql);
        $statement->bindValue(":leido", $leido);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, static::$class);
    }
    public static function getAll()
        {
            return parent::getAll();
        }
    }