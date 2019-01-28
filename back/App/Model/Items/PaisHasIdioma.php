<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 21/11/2018
 * Time: 9:17
 */
namespace Model\Items;

class PaisHasIdioma {
    private $idIdioma;
    private $idPais;
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
    public function getIdPais()
    {
        return $this->idPais;
    }

    /**
     * @param mixed $idPais
     */
    public function setIdPais($idPais): void
    {
        $this->idPais = $idPais;
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