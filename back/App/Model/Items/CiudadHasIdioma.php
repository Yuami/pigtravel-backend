<?php
namespace Model\Items;

class CiudadHAsIdioma
{

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