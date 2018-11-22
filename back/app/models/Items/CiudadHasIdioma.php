<?php

class CiudadHAsIdioma {

    private $idIdioma;
    private $idCiudad;
    private $nombre;

    public function __construct($idCiudad,$idIdioma,$nombre){

        $this->idIdioma=$idIdioma;
        $this->idCiudad=$idCiudad;
        $this->nombre=$nombre;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre(){
        $this->nombre=$nombre;
    }
    
}