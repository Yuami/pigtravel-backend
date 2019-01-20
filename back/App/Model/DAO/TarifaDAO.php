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
        $p = DB::conn()->lastInsertId('tarifa');
        die(var_dump($p));
    }

    public static function getByIdVivienda($id)
    {
        $array = self::ifExistTarifa($arrVHT = ViviendaHasTarifaDAO::getByIdVivienda($id));
        if (empty($array)) {
            return $array;
        } else {
            foreach ($array as $VHT) {
                $tarifa = TarifaDAO::getByIdTarifa($VHT->getIdTarifa());
                $tarifas[] = $tarifa[0];
            }
            return $tarifas;
        }
    }

    public static function ifExistTarifa($tarifas)
    {
        $vacio = [];
        if ($tarifas != null) {
            return $tarifas;
        } else {
            return $vacio;
        }
    }

    public static function getByIdTarifa($id)
    {
        return parent::getBy('id', $id);
    }
}