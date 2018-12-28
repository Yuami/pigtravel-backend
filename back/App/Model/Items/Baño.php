<?php
namespace Model\Items;
class Baño
{
    private $id;
    private $tipoBaño;
    private $idServicioBano;

    public function __construct($id, $tipoBaño,$idServicioBano)
    {
        $this->id = $id;
        $this->tipoBaño = $tipoBaño;
        $this->idServicioBano=idServicioBano;
    }

    public function getTipoBaño()
    {
        return $this->tipoBaño;
    }

    public function setTipoBaño($tipoBaño): void
    {
        $this->tipoBaño = $tipoBaño;
    }
    public function getServicioBaño()
    {
        return $this->idServicioBano;
    }
}
