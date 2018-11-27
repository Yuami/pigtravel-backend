<?php

class Bloqueo
{

    private $id;
    private $activo;
    private $fechaInicio;
    private $fechaFin;

    /**
     * Bloqueo constructor.
     * @param $id
     * @param $activo
     * @param $fechaInicio
     * @param $fechaFin
     */
    public function __construct($id, $activo, $fechaInicio, $fechaFin)
    {
        $this->id = $id;
        $this->activo = $activo;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }

    /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * @param mixed $activo
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;
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
    public function setFechaInicio($fechaInicio)
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
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }


}