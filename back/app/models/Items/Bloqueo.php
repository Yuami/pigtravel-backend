<?php

class Bloqueo {

    private $id;
    private $activo;
    private $fechaInicio;
    private $fechaFin;

    public function __construct($id,$activo,$fechaFin,$fechaInicio){

        $this->id=$id;
        $this->activo=$activo;
        $this->fechaInicio=$fechaInicio;
        $this->fechaFin=$fechaFin;
    }
    
    public function getActivo(){
        return $this->activo;
    }

    public function getFechaInicio(){
        return $this->fechaInicio;
    }

    public function getFechaFin(){
        return $this->fechaFin;
    }

    public function setActivo($activo){
        $this->activo=$activo;
    }
    
    public function setFechaInicio($fechaInicio){
        $this->fechaInicio=$fechaInicio;
    }

    public function setFechaFin($fechaFin){
        $this->fechaFin=$fechaFin;
    }

    

}