<?php

class LiniaPoliticaCancelacion {

    private $idPoliticaCancelacion;
    private $dias;
    private $porcentaje;

    public function __construct($dias,$idPoliticaCancelacion,$porcentaje){

        $this->dias=$dias;
        $this->idPoliticaCancelacion=$idPoliticaCancelacion;
        $this->porcentaje=$porcentaje;
    }
    
    public function getDias(){
        return $this->dias;
    }

    public function setDias(){
        $this->dias=$dias;
    }

    public function getPorcentaje(){
        return $this->porcentaje;
    }

    public function setPorcentaje(){
        $this->porcentaje=$porcentaje;
    }
}