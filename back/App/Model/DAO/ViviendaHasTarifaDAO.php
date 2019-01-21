<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:52
 */

namespace Model\DAO;
class ViviendaHasTarifaDAO extends DAO
{
    protected static $table = "vivienda_has_tarifa";
    protected static $class = "ViviendaHasTarifa";

    public static function insert(array $parameters)
    {
        $idVivienda = $parameters["idVivienda"];
        $idTarifa = $parameters["idTarifa"];
        $sql = "insert into vivienda_has_tarifa (idVivienda, idTarifa)
                values (:idV,:idT)";
        $stm = DB::conn()->prepare($sql);
        $stm->bindValue(":idV", $idVivienda);
        $stm->bindValue(":idT", $idTarifa);
        $stm->execute();
    }

    public static function getByIdVivienda($id)
    {
        return parent::getBy('idVivienda', $id);
    }
}