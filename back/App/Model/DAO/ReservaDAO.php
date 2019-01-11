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
       inner join reserva_has_estado rhe on r.id = rhe.idReserva
       inner join vivienda v on r.idVivienda = v.id
       inner join estado_has_idioma ehi on rhe.idEstado = ehi.idEstado
       inner join cliente c on r.idCliente = c.idPersona
       inner join persona p on c.idPersona = p.id where v.idVendedor= :id order by r.fechaReserva');
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, parent::getClassName());
    }

    public static function getBeneficioViviendasByMes($id,$mes)
    {
        $statement = DB::conn()->prepare('SELECT r.idVivienda,sum(r.precio) as precio from reserva r
       inner join reserva_has_estado rhe on r.id = rhe.idReserva
       inner join vivienda v on r.idVivienda = v.id
       inner join estado_has_idioma ehi on rhe.idEstado = ehi.idEstado
       inner join cliente c on r.idCliente = c.idPersona
       inner join persona p on c.idPersona = p.id 
       where v.idVendedor= :id and month(r.fechaReserva)=:mes
       group by r.idVivienda;');

        $statement->bindValue(':mes', $mes, PDO::PARAM_INT);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, parent::getClassName());
    }
}