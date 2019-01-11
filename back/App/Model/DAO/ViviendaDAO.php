<?php

namespace Model\DAO;

use PDO;

class ViviendaDAO extends DAO
{
    protected static $table = "vivienda";
    protected static $class = "Vivienda";

    public static function insert(array $parameters)
    {
        $nombre = $parameters["nombre"];
        $capacidad = $parameters["capacidad"];
        $coordX = $parameters["coordX"];
        $coordY = $parameters["coordY"];
        $metrosCuadrados = $parameters["metrosCuadrados"];
        $calle = $parameters["calle"];
        $horaEntrada = $parameters["horaEntrada"];
        $horaSalida = $parameters["horaSalida"];
        $alquilerAutomatico = $parameters["alquilerAutomatico"];
        $idTipoVivienda = $parameters["idTipoVivienda"];
        $idCiudad = $parameters["idCiudad"];
        $idVendedor = $parameters["idVendedor"];
        $descripcion = $parameters["descripcion"];

        $sql = "insert into vivienda (nombre, capacidad, coordX, coordY, metrosCuadrados, calle, horaEntrada, horaSalida, alquilerAutomatico, idTipoVivienda, idCiudad, idVendedor, descripcion)
                values (:n, :c, :x, :y, :m2, :calle, :hE, :hS, :aA, :idTV, :idC, :idV, :des)";
        $stm = DB::conn()->prepare($sql);
        $stm->bindValue(":n", $nombre);
        $stm->bindValue(":c", $capacidad);
        $stm->bindValue(":x", $coordX);
        $stm->bindValue(":y", $coordY);
        $stm->bindValue(":m2", $metrosCuadrados);
        $stm->bindValue(":calle", $calle);
        $stm->bindValue(":hE", $horaEntrada);
        $stm->bindValue(":hS", $horaSalida);
        $stm->bindValue(":aA", $alquilerAutomatico);
        $stm->bindValue(":idTV", $idTipoVivienda);
        $stm->bindValue(":idC", $idCiudad);
        $stm->bindValue(":idV", $idVendedor);
        $stm->bindValue(":des", $descripcion);
        $stm->execute();
    }

    public static function update(array $parameters)
    {
        $id = $parameters["id"];
        $nombre = $parameters["nombre"];
        $capacidad = $parameters["capacidad"];
        $metrosCuadrados = $parameters["metrosCuadrados"];
        $calle = $parameters["calle"];
        $horaEntrada = $parameters["horaEntrada"];
        $horaSalida = $parameters["horaSalida"];
        $alquilerAutomatico = $parameters["alquilerAutomatico"];
        $idCiudad = $parameters["idCiudad"];
        $descripcion = $parameters["descripcion"];

        $sql = "update vivienda set nombre = :n,
capacidad = :c,
metrosCuadrados =  :m2,
calle = :calle,
horaEntrada = :hE,
horaSalida = :hS,
alquilerAutomatico = :aA,
idCiudad = :idC,
descripcion = :des
        where id = :id";
        $stm = DB::conn()->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->bindValue(":n", $nombre);
        $stm->bindValue(":c", $capacidad);
        $stm->bindValue(":m2", $metrosCuadrados);
        $stm->bindValue(":calle", $calle);
        $stm->bindValue(":hE", $horaEntrada);
        $stm->bindValue(":hS", $horaSalida);
        $stm->bindValue(":aA", $alquilerAutomatico);
        $stm->bindValue(":idC", $idCiudad);
        $stm->bindValue(":des", $descripcion);
        $stm->execute();
    }

    public static function getByTipoVivienda($tipo)
    {
        return parent::getBy("idTipoVivienda", $tipo);
    }

    /**
     * @param $bool
     * @return array
     */
    public static function getByAlquilerAutomatico($bool)
    {
        return parent::getBy("alquilerAutomatico", $bool);
    }

    /**
     * @param $id
     * @return array
     */
    public static function getByIDCiudad($id)
    {
        return parent::getBy("idCiudad", $id);
    }

    public static function getByVendedor($idV)
    {
        return parent::getBy("idVendedor", $idV);
    }

    /**
     * @param $bool
     * @return array
     */
    public static function getByDestacada($bool)
    {
        return parent::getBy("destacada", $bool);
    }

    /**
     * @param $capacidad
     * @return array
     */
    public static function getByCapacidad($capacidad)
    {
        $statement = DB::conn()->prepare("SELECT * FROM vivienda where capacidad >= :capacidad");
        $statement->bindValue(":capacidad", $capacidad, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, self::$table);
    }
}