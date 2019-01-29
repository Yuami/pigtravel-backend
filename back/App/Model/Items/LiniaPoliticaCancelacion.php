<?php

namespace Model\Items;

class LiniaPoliticaCancelacion
{
    private $id;
    private $idPoliticaCancelacion;
    private $dias;
    private $porcentaje;

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
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * @param mixed $dias
     */
    public function setDias($dias)
    {
        $this->dias = $dias;
    }

    /**
     * @return mixed
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * @param mixed $porcentaje
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;
    }


}