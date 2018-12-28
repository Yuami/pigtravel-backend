<?php
namespace Model\Items;

class Ciudad
{
    private $id;
    private $cp;
    private $idPais;
    public function __construct($id, $cp,$idPais)
    {
        $this->id = $id;
        $this->cp = $cp;
        $this->idPais=$idPais;
    }
    public function getCP()
    {
        return $this->cp;
    }
    public function getPais()
    {
        return $this->idPais;
    }
}


