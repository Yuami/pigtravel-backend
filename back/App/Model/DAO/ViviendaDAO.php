<?php
namespace Model\DAO;
use PDO;

class ViviendaDAO extends DAO{
    protected static $table = "vivienda";
    protected static $class = "Vivienda";

    public static function insert(array $parameters) {
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
        $stm->bindValue(":n",$nombre);
        $stm->bindValue(":c",$capacidad);
        $stm->bindValue(":x",$coordX);
        $stm->bindValue(":y",$coordY);
        $stm->bindValue(":m2",$metrosCuadrados);
        $stm->bindValue(":calle",$calle);
        $stm->bindValue(":hE",$horaEntrada);
        $stm->bindValue(":hS",$horaSalida);
        $stm->bindValue(":aA",$alquilerAutomatico);
        $stm->bindValue(":idTV",$idTipoVivienda);
        $stm->bindValue(":idC",$idCiudad);
        $stm->bindValue(":idV",$idVendedor);
        $stm->bindValue(":des",$descripcion);
        $stm->execute();
    }


    public static function getByTipoVivienda($tipo)
    {
        return parent::getBy("idTipoVvienda", $tipo);
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