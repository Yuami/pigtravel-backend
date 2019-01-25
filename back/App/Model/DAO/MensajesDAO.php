<?php
namespace Model\DAO;
use Config\Session;
use PDO;

class MensajesDAO extends DAO {
    protected static $table = "mensajes";
    protected static $class = "Mensaje";


    public static function insert(array $parameters) {

            $idReciever =$parameters["idReciever"];
            $mensaje =$parameters["mensaje"];
            $idVivienda =$parameters["idVivienda"];
            $sql = "insert into mensajes(idSender,idReciever,mensaje,fechaEnviado,leido,idVivienda)
                values (:idSender,:idReciever, :mensaje,now(),1,:idVivienda)";
            $stm = DB::conn()->prepare($sql);
            $stm->bindValue(':idSender',Session::get('userID'));
            $stm->bindValue(':idReciever',$idReciever);
            $stm->bindValue(':mensaje',$mensaje);
            $stm->bindValue(':idVivienda',$idVivienda);
            $stm->execute();
            header("Location: " . DOMAIN);
        }
    public static function leido($idMensaje) {

        $sql = "update mensajes set leido=0 where id=:idMensaje";
        $stm = DB::conn()->prepare($sql);
        $stm->bindValue(':idMensaje',$idMensaje);
        $stm->execute();
    }

    public static function getByLeido($leido) {
        $res = parent::getBy("leido", $leido);
        if (isset($res))
            return $res;
        return null;
    }
    public static function getByidReserva($id) {
        $res = parent::getBy("idReserva", $id);
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
    public static function getChat($idP)
    {
        $statement = DB::conn()->prepare("SELECT * FROM mensajes WHERE idReciever=:idP OR idSender=:idP order by fechaEnviado");
        $statement->bindValue(":idP", $idP, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS,parent::getClassName());
    }


    public static function getAll()
        {
            return parent::getAll();
        }
    }