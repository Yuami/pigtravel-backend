<?php

class ViviendaHasTarifa
{
    private $idIdioma;
    private $idTipo_vivienda;
    private $nombre;

    /**
     * ViviendaHasTarifa constructor.
     * @param $idIdioma
     * @param $idTipo_vivienda
     * @param $nombre
     */
    public function __construct($idIdioma, $idTipo_vivienda, $nombre)
    {
        $this->idIdioma = $idIdioma;
        $this->idTipo_vivienda = $idTipo_vivienda;
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}