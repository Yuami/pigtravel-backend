<?php

namespace Model\Items;

class Tarifa
{
    private $id;
    private $fechaInicio;
    private $fechaFin;
    private $precio;
    private $general;
    private $idPoliticaCancelacion;

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
    public function setIdPoliticaCancelacion($idPoliticaCancelacion)
    {
        $this->idPoliticaCancelacion = $idPoliticaCancelacion;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @return mixed
     */
    public function getGeneral()
    {
        return $this->general;
    }

    /**
     * @param mixed $fechaInicio
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    /**
     * @param mixed $fechaFin
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @param mixed $general
     */
    public function setGeneral($general)
    {
        $this->general = $general;
    }

}