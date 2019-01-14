<?php
namespace Model\DAO;
require_once MODEL . "Items/Mensaje.php";
require_once MODEL . "Items/Vivienda.php";
require_once MODEL . "DAO/ViviendaDAO.php";
require_once MODEL . "Items/Persona.php";
require_once MODEL . "DAO/PersonaDAO.php";
class MensajesDAO extends DAO {
    protected static $table = "mensajes";
    protected static $class = "Mensaje";


    public static function insert(array $parameters) {
            $idReciever =$parameters["idReciever"];
            $mensaje =$parameters["mensaje"];
            $idVivienda =$parameters["idVivienda"];
            $sql = "insert into mensajes(idSender,idReciever,mensaje,fechaEnviado,leido,idVivienda)
                values (:idSender,:idReciever, :mensaje,'now()','1',:idVivienda)";
            $stm = DB::conn()->prepare($sql);
            $stm->bindValue(':idReciever',$idReciever);
            $stm->bindValue(':idSender',Session::get('userID'));
            $stm->bindValue(':mensaje',$mensaje);
            $stm->bindValue(':idVivienda',$idVivienda);

            $stm->execute();
            header("Location: " . DOMAIN);
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
        $sql = "SELECT * FROM mensajes WHERE leido :value and idReciever=".Session::get('userID');
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