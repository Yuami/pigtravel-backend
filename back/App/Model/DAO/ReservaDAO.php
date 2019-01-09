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

    public static function getByPropietario($id)
    {
        $statement = DB::conn()->prepare('SELECT r.* from reserva r
       inner join reserva_has_estado rhe on r.id = rhe.idReserva
       inner join vivienda v on r.idVivienda = v.id
       inner join estado_has_idioma ehi on rhe.idEstado = ehi.idEstado
       inner join cliente c on r.idCliente = c.idPersona
       inner join persona p on c.idPersona = p.id where v.idVendedor= :id');
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, parent::getClassName());
    }
}