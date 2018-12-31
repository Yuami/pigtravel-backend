<?php
namespace Model\DAO;
use PDO;

class ReservaDAO extends DAO {
    protected static $table = "reserva";
    protected static $class = "Reserva";

    public function getByVivienda($id) {
        return parent::getBy('idVivienda', $id);
    }

    public function getByPropietario($id) {
        $statement = DB::conn()->prepare('select * from ' . self::$table . ' inner join vivienda v on reserva.idVivienda = v.id inner join vendedor_vivienda v3 on v.idVendedor = v3.idPersona where v3.idPersona = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, self::$class);
    }
}