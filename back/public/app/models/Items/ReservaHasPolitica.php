<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 21/11/2018
 * Time: 9:18
 */

class ReservaHasPolitica {
    private $idReserva;
    private $idPoliticaCancelacion;
    private $fechaInicio;
    private $fechaFin;

    /**
     * @return mixed
     */
    public function getIdReserva()
    {
        return $this->idReserva;
    }

    /**
     * @param mixed $idReserva
     */
    public function setIdReserva($idReserva): void
    {
        $this->idReserva = $idReserva;
    }

    /**
     * @return mixed
     */
    public function getIdPoliticaCancelacion()
    {
        return $this->idPoliticaCancelacion;
    }

    /**
     * @param mixed $idPoliticaCancelacion
     */
    public function setIdPoliticaCancelacion($idPoliticaCancelacion): void
    {
        $this->idPoliticaCancelacion = $idPoliticaCancelacion;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * @param mixed $fechaInicio
     */
    public function setFechaInicio($fechaInicio): void
    {
        $this->fechaInicio = $fechaInicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * @param mixed $fechaFin
     */
    public function setFechaFin($fechaFin): void
    {
        $this->fechaFin = $fechaFin;
    }


}