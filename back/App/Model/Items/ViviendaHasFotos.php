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
    public function getIdVivienda() : int
    {
        return $this->idVivienda;
    }

    /**
     * @return mixed
     */
    public function getIdFoto() : int
    {
        return $this->idFoto;
    }

    public function getFoto() : Foto
    {
        return FotoDAO::getById($this->idFoto);
    }

    public function getFotoPath() : string
    {
        return $this->getFoto()->getPath();
    }
}
