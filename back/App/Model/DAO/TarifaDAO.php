<?php

namespace Model\DAO;

class TarifaDAO extends DAO
{
    protected static $table = "tarifa";
    protected static $class = "Tarifa";

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