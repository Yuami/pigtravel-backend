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

    public function __construct($id, $nombre)
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
}

