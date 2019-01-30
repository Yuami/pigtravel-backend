<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 19/11/2018
 * Time: 19:49
 */
namespace Model\Items;

class ViviendaHasServicio
{
    private $activo;
    private $idVivienda;
    private $idServicio;

    public function getActivo()
    {
        return $this->activo;
    }

    public function setActivo($activo): void
    {
        $this->activo = $activo;
    }
    public function getIdServicio()
    {
        return $this->idServicio;
    }

    public function setIdServicio($idServicio): void
    {
        $this->idServicio = $idServicio;
    }
    public function getIdVivienda()
    {
        return $this->idVivienda;
    }

    public function setIdVivienda($idVivienda): void
    {
        $this->idVivienda = $idVivienda;
    }

}