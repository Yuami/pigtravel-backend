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
    public function getIdIdioma()
    {
        return $this->idIdioma;
    }

    /**
     * @param mixed $idIdioma
     */
    public function setIdIdioma($idIdioma)
    {
        $this->idIdioma = $idIdioma;
    }

    /**
     * @return mixed
     */
    public function getIdTipoVivienda()
    {
        return $this->idTipo_vivienda;
    }

    /**
     * @param mixed $idTipo_vivienda
     */
    public function setIdTipoVivienda($idTipo_vivienda)
    {
        $this->idTipo_vivienda = $idTipo_vivienda;
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