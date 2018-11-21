<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 19/11/2018
 * Time: 19:49
 */

class Vivienda_Servicio
{
    private $id;
    private $activo;

    public function __construct($id, $activo)
    {
        $this->id = $id;
        $this->activo = $activo;
    }

    public function getActivo()
    {
        return $this->activo;
    }

    public function setActivo($activo): void
    {
        $this->activo = $activo;
    }

}