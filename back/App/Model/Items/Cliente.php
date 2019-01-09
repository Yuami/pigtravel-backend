<?php
namespace Model\Items;

class Cliente
{
    private $idPersona;
    public function __construct($idPersona)
    {
        $this->idPersona=$idPersona;
    }
    public function getIdPersona()
    {
        return $this->idPersona;
    }

}

