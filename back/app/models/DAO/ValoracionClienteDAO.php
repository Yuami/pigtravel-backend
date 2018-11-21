<?php

class ValoracionClienteDAO extends DAO
{
    public function getByIdCliente($id) {
        $statement = parent::prepare("SELECT * FROM valoracion_cliente WHERE idCliente=:id");
        $statement->bindValue(":id", $id);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getByIdClienteTime($id) {
        $statement = parent::prepare("SELECT * FROM valoracion_cliente WHERE idCliente=:id order by fechaValoracion desc");
        $statement->bindValue(":id", $id);
        $statement->execute();

        return $statement->fetchAll();
    }
}