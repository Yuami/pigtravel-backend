<?php
namespace Model\Items;
use Model\DAO\FotoDAO;

class ViviendaHasFotos
{
    private $idVivienda;
    private $idFoto;

    /**
     * @return mixed
     */
    public function getIdVivienda()
    {
        return $this->idVivienda;
    }

    /**
     * @return mixed
     */
    public function getIdFoto()
    {
        return $this->idFoto;
    }

    public function getFoto()
    {
        return FotoDAO::getById($this->idFoto);
    }
}
