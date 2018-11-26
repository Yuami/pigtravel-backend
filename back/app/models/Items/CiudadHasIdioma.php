<?php

class CiudadHAsIdioma {

    private $idIdioma;
    private $idCiudad;
    private $nombre;

    /**
     * CiudadHAsIdioma constructor.
     * @param $idIdioma
     * @param $idCiudad
     * @param $nombre
     */
    public function __construct($idIdioma, $idCiudad, $nombre)
    {
        $this->idIdioma = $idIdioma;
        $this->idCiudad = $idCiudad;
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
    public function getIdCiudad()
    {
        return $this->idCiudad;
    }

    /**
     * @param mixed $idCiudad
     */
    public function setIdCiudad($idCiudad)
    {
        $this->idCiudad = $idCiudad;
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