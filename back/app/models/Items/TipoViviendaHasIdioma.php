<?php

class TipoViviendaHasIdioma
{
    private $idIdioma;
    private $idTipoVivienda;
    private $nombre;

    /**
     * TipoViviendaHasIdioma constructor.
     * @param $idIdioma
     * @param $idTipoVivienda
     * @param $nombre
     */
    public function __construct($idIdioma, $idTipoVivienda, $nombre)
    {
        $this->idIdioma = $idIdioma;
        $this->idTipoVivienda = $idTipoVivienda;
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