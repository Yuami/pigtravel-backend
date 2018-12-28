<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 21/11/2018
 * Time: 9:19
 */
namespace Model\Items;

class ServicioHasIdioma {
    private $idIdioma;
    private $idServicio;
    private $nombre;

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
    public function setIdIdioma($idIdioma): void
    {
        $this->idIdioma = $idIdioma;
    }

    /**
     * @return mixed
     */
    public function getIdServicio()
    {
        return $this->idServicio;
    }

    /**
     * @param mixed $idServicio
     */
    public function setIdServicio($idServicio): void
    {
        $this->idServicio = $idServicio;
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
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }


}