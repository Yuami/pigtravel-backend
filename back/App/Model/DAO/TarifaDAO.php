<?php

namespace Model\DAO;

class TarifaDAO extends DAO
{
    protected static $table = "tarifa";
    protected static $class = "Tarifa";

    public static function insert(array $parameters)
    {
        $fechaInicio = $parameters["fechaInicio"];
        $fechaFin = $parameters["fechaFin"];
        $precio = $parameters["precio"];
        $general = $parameters["general"];
        $idPoliticaCancelacion = $parameters["idPoliticaCancelacion"];


        $sql = "insert into tarifa (fechaInicio, fechaFin, precio, general, idPoliticaCancelacion)
                values (:fechaI,:fechaF,:p,:g,:idPC)";
        $stm = DB::conn()->prepare($sql);
        $stm->bindValue(":fechaI", $fechaInicio);
        $stm->bindValue(":fechaF", $fechaFin);
        $stm->bindValue(":p", $precio);
        $stm->bindValue(":g", $general);
        $stm->bindValue(":idPC", $idPoliticaCancelacion);
        $stm->execute();
    }

    public static function getByIdVivienda($id)
    {
        $arrVHT = ViviendaHasTarifaDAO::getByIdVivienda($id);
        $ex = TarifaDAO::getByIdTarifa($arrVHT[0]->getIdTarifa());
        return $ex;
    }

    public static function getByIdTarifa($id)
    {
        return parent::getBy('id', $id);
    }
}