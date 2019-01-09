<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 9:14
 */
namespace Model\Items;

class PremiumHasVivienda {
    private $idPremium;
    private $idVivienda;

    /**
     * PremiumHasVivienda constructor.
     * @param $idPremium
     * @param $idVivienda
     */
    public function __construct($idPremium, $idVivienda)
    {
        $this->idPremium = $idPremium;
        $this->idVivienda = $idVivienda;
    }
}