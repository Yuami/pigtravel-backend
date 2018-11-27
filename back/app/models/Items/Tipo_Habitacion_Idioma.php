<?php

class Tipo_Habitacion_Idioma
{
    private $id;
    private $idIdioma;
    private $idTipo_habitacion;
    private $nombre;

    public function __construct($id,$idIdioma,$idTipo_habitacion,$nombre)
    {
        $this->id = $id;
        $this->idIdioma=$idIdioma;
        $this->idTipo_habitacion=$idTipo_habitacion;
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
    public function getIdIdioma()
    {
        return $this->idIdioma;
    }

    public function getIdTipoHabitacion()
    {
        return $this->idTipo_habitacion;
   }

}

