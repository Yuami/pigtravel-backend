<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 19/11/2018
 * Time: 19:45
 */
namespace Model\Items;

class Valoracion_Vivienda
{
    private $id;
    private $mensaje;
    private $idPersona;
    private $idVivienda;

    public function __construct($id, $mensaje,$idPersona,$idVivienda)
    {
        $this->id = $id;
        $this->mensaje = $mensaje;
        $this->idPersona=$idPersona;
        $this->idVivienda=$idVivienda;
    }

    public function getMensaje()
    {
        return $this->nombre;
    }

    public function setMensaje($mensaje): void
    {
        $this->nombre = $mensaje;
    }

    public function getIdPersona()
    {
        return $this->idPersona;
    }
    public function getIdVivienda()
    {
        return $this->idVivienda;
    }

}