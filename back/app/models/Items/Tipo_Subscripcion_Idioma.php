<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 19/11/2018
 * Time: 19:43
 */

class Tipo_Subscripcion_Idioma
{

    private $id;
    private $nombre;
    private $idIdioma;
    private $idPremium;

    public function __construct($id, $nombre,$idPremium,$idIdioma)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->idPremium=$idPremium;
        $this->idIdioma=$idIdioma;
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

    public function getIdPremium()
    {
        return $this->idPremium;
    }
}


