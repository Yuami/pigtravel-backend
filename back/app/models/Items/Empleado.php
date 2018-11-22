<?php
class Empleado {
    private $idPersona;
    private $idRol;

    public function __construct($idPersona, $idRol)
    {
        $this->idPersona = $idPersona;
        $this->idRol = $idRol;
    }

    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * @return mixed
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * @param mixed $idRol
     */
    public function setIdRol($idRol): void
    {
        $this->idRol = $idRol;
    }
}