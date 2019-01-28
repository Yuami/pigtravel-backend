<?php

namespace Model\DAO;

class TarifaDAO extends DAO
{
    protected static $table = "tarifa";
    protected static $class = "Tarifa";


    public static function update(array $parameters)
    {
        $id = $parameters["id"];
        $fechaInicio = $parameters["fechaInicio"];
        $fechaFin = $parameters["fechaFin"];
        $precio = $parameters["precio"];
        $general = $parameters["general"];
        $idPoliticaCancelacion = $parameters["idPoliticaCancelacion"];
        $sql = "update tarifa
set fechaInicio           = :fI,
    fechaFin              = :fF,
    precio                = :p,
    general               = :g,
    idPoliticaCancelacion = :idPC
    where id = :id";
        $conn = DB::conn();
        $stm = $conn->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->bindValue(":fI", $fechaInicio);
        $stm->bindValue(":fF", $fechaFin);
        $stm->bindValue(":p", $precio);
        $stm->bindValue(":g", $general);
        $stm->bindValue(":idPC", $idPoliticaCancelacion);
        $stm->execute();
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