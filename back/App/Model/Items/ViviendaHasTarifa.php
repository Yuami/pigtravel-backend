<?php
namespace Model\Items;

class ViviendaHasTarifa
{
    private $idTarifa;
    private $idVivienda;

    /**
     * @return mixed
     */
    public function getIdTarifa()
    {
        return $this->idTarifa;
    }

    /**
     * @param mixed $idTarifa
     */
    public function setIdTarifa($idTarifa)
    {
        $this->idTarifa = $idTarifa;
    }

    /**
     * @return mixed
     */
    public function getIdVivienda()
    {
        return $this->idVivienda;
    }

    /**
     * @param mixed $idVivienda
     */
    public function setIdVivienda($idVivienda)
    {
        $this->idVivienda = $idVivienda;
    }
}