<?php

class Habitacion {

    private $idVivienda;
    private $idTipoHabitacion;
   
    public function __construct($idTipoHabitacion,$idVivienda){

        $this->idVivienda=$idVivienda;
        $this->idTipoHabitacion=$idTipoHabitacion;
       
    }
    
}