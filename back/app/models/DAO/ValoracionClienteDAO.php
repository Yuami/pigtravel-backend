<?php
include("DAO.php");

class ValoracionClienteDAO extends DAO
{
    private static $table = "valoracion_cliente";

    public static function getByIdCliente($id) {
        $statement = parent::prepare("SELECT * FROM " . self::$table . " WHERE idCliente=:id");
        $statement->bindValue(":id", $id);
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getByIdClienteTime($id) {
        $statement = parent::prepare("SELECT * FROM " . self::$table . " WHERE idCliente=:id order by fechaValoracion desc");
        $statement->bindValue(":id", $id);
        $statement->execute();

        return $statement->fetchAll();
    }
}