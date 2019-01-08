<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 21/11/2018
 * Time: 9:18
 */
namespace Model\Items;

class TipoCamaHasIdioma
{
private $idIdioma;
private $idTipoCama;
private $nombre;

    /**
     * TipoCamaHasIdioma constructor.
     * @param $idIdioma
     * @param $idTipoCama
     * @param $nombre
     */
    public function __construct($idIdioma, $idTipoCama, $nombre)
    {
        $this->idIdioma = $idIdioma;
        $this->idTipoCama = $idTipoCama;
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
    public function getIdTipoCama()
    {
        return $this->idTipoCama;
    }

    /**
     * @param mixed $idTipoCama
     */
    public function setIdTipoCama($idTipoCama)
    {
        $this->idTipoCama = $idTipoCama;
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