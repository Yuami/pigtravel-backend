<?php

class PremiumHasIdioma {
private $idPremium;
private $idVivienda;

    /**
     * PremiumHasIdioma constructor.
     * @param $idPremium
     * @param $idVivienda
     */
    public function __construct($idPremium, $idVivienda)
    {
        $this->idPremium = $idPremium;
        $this->idVivienda = $idVivienda;
    }

    /**
     * @return mixed
     */
    public function getIdPremium()
    {
        return $this->idPremium;
    }

    /**
     * @param mixed $idPremium
     */
    public function setIdPremium($idPremium)
    {
        $this->idPremium = $idPremium;
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