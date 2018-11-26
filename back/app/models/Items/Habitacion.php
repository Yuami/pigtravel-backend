<?php

class Habitacion {

    private $idVivienda;
    private $idTipoHabitacion;
   
    public function __construct($idTipoHabitacion,$idVivienda){

        $this->idVivienda=$idVivienda;
        $this->idTipoHabitacion=$idTipoHabitacion;
       
    }

    /**
     * @return mixed
     */
    public function getIdVivienda()
    {
        return $this->idVivienda;
    }

    /**
     * @param mixed $idVivienda
     */
    public function setIdVivienda($idVivienda)
    {
        $this->idVivienda = $idVivienda;
    }

    /**
     * @return mixed
     */
    public function getIdTipoHabitacion()
    {
        return $this->idTipoHabitacion;
    }

    /**
     * @param mixed $idTipoHabitacion
     */
    public function setIdTipoHabitacion($idTipoHabitacion)
    {
        $this->idTipoHabitacion = $idTipoHabitacion;
    }
    
}