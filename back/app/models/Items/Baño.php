<?php

class Baño
{
    private $id;
    private $tipoBaño;
    public $serveis = array();

    public function __construct($id, $tipoBaño)
    {

        $this->id = $id;
        $this->tipoBaño = $tipoBaño;
        $this->serveis=getServeis(id);
    }

    public function getTipoBaño()
    {
        return $this->tipoBaño;
    }

    public function setTipoBaño($tipoBaño): void
    {
        $this->tipoBaño = $tipoBaño;
    }
    public function getServeis($idBaño){

            $statement = parent::prepare("SELECT id FROM servicio_baño WHERE id='idBaño'");
            $statement->execute();
            return $statement->fetchAll();
    }

   
}
