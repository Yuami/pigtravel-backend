<?php

namespace Model\DAO;

use PDO;

class ReservaDAO extends DAO
{
    protected static $table = "reserva";
    protected static $class = "Reserva";

    public function getByVivienda($id)
    {
        return parent::getBy('idVivienda', $id);
    }

    public static function getByVendedor($id)
    {
        $statement = DB::conn()->prepare('SELECT r.* from reserva r
       inner join vivienda v on r.idVivienda = v.id
       where v.idVendedor= :id order by r.fechaReserva desc');
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, parent::getClassName());
    }

    public static function getByVendedorMax($id)
    {
        $statement = DB::conn()->prepare('SELECT r.*,v.nombre from reserva r
       inner join vivienda v on r.idVivienda = v.id
        where v.idVendedor= :id order by r.fechaReserva desc limit 5');
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, parent::getClassName());
    }

    public static function getBeneficioByMesAll($id)
    {
        $statement = DB::conn()->prepare('SELECT sum(r.precio) as beneficioMes,v.nombre, month(r.fechaReserva) as mes from reserva r
       inner join vivienda v on r.idVivienda = v.id
       group by r.idVivienda,MONTH (r.fechaReserva)');
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, parent::getClassName());
    }
}