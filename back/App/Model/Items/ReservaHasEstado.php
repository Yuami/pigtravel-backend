<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 21/11/2018
 * Time: 9:18
 */

namespace Model\Items;

use Model\DAO\EstadoHasIdiomaDAO;
use Model\DAO\ReservaHasEstadoDAO;

class ReservaHasEstado
{

    private $idReserva;
    private $idEstado;
    private $fechaCambio;

    /**
     * @return mixed
     */
    public function getIdReserva()
    {
        return $this->idReserva;
    }

    /**
     * @return mixed
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * @return mixed
     */
    public function getFechaCambio()
    {
        return $this->fechaCambio;
    }

    /**
     * @param mixed $fechaCambio
     */
    public function setFechaCambio($fechaCambio): void
    {
        $this->fechaCambio = $fechaCambio;
    }

    public function getNombre()
    {
        return EstadoHasIdiomaDAO::getNombre($this->idEstado)->getNombre();
    }

    public static function getEstadosByReserva(Reserva $resesrva)
    {
        return ReservaHasEstadoDAO::getByIdReserva($resesrva->getId());
    }

    public static function getLastEstado(Reserva $resesrva)
    {
        return ReservaHasEstadoDAO::getLastEstado($resesrva->getId());
    }
}