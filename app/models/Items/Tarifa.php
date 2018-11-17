<?php

class Tarifa {
    private $id;
    private $fechaInicio;
    private $fechaFin;

    /**
     * Tarifa constructor.
     * @param $id
     * @param $fechaInicio
     * @param $fechaFin
     */
    public function __construct($id, $fechaInicio, $fechaFin) {
        $this->id = $id;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    /**
     * @param mixed $fechaInicio
     */
    public function setFechaInicio($fechaInicio): void {
        $this->fechaInicio = $fechaInicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin() {
        return $this->fechaFin;
    }

    /**
     * @param mixed $fechaFin
     */
    public function setFechaFin($fechaFin): void {
        $this->fechaFin = $fechaFin;
    }


}