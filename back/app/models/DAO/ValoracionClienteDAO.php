<?php
include "DAO.php";
include_once ("../Items/ValoracionCliente.php");

class ValoracionClienteDAO extends DAO {

    protected static $table = "valoracion_cliente";
    protected static $class = "Valoracion_Cliente";

    public static function getByIdCliente($id) {
        $statement = DB::conn()->prepare("SELECT * FROM " . self::$table . " WHERE idCliente=:id");
        $statement->bindValue(":id", $id);
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getByIdClienteTime($id) {
        $statement = DB::conn()->prepare("SELECT * FROM " . self::$table . " WHERE idCliente=:id order by fechaValoracion desc");
        $statement->bindValue(":id", $id);
        $statement->execute();

        return $statement->fetchAll();
    }
}
echo json_encode(ValoracionClienteDAO::getBy("idCliente",3));