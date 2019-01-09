<?php

namespace Model\Items;

class CiudadHasIdioma
{

    private $idIdioma;
    private $idCiudad;
    private $nombre;


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