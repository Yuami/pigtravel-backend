<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 19/11/2018
 * Time: 19:43
 */

class Tipo_Valoracion_Idioma
{

    private $id;
    private $nombre;
    private $idIdioma;
    private $idTipoValoracion;

    public function __construct($id, $nombre,$idIdioma,$idTipoValoracion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->idIdioma=$idIdioma;
        $this->idTipoValoracion=$idTipoValoracion;
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

    public function getIdTipoValoracion()
    {
        return $this->idTipoValoracion;
    }
}

