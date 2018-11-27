<?php
class Empleado {
    private $idPersona;
    private $idRol;

    public function __construct($idPersona, $idRol)
    {
        $this->idPersona = $idPersona;
        $this->idRol = $idRol;
    }

    public function getIdPersona()
    {
        return $this->idPersona;
    }

    public function getIdRol()
    {
        return $this->idRol;
    }

    public function setIdRol($idRol): void
    {
        $this->idRol = $idRol;
    }
}