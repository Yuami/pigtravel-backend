<?php
namespace Model\Items;

class TipoViviendaHasIdioma
{
    private $idIdioma;
    private $idTipo_vivienda;
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
    public function setIdIdioma($idIdioma)
    {
        $this->idIdioma = $idIdioma;
    }

    /**
     * @return mixed
     */
    public function getIdTipoVivienda()
    {
        return $this->idTipo_vivienda;
    }

    /**
     * @param mixed $idTipoVivienda
     */
    public function setIdTipoVivienda($idTipoVivienda)
    {
        $this->idTipo_vivienda = $idTipoVivienda;
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