<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 21/11/2018
 * Time: 9:19
 */

class ValoracionHasTipoValoracion {
private $idValoracion;
private $idTipoValoracion;
private $valor;

    /**
     * ValoracionHasTipoValoracion constructor.
     * @param $idValoracion
     * @param $idTipoValoracion
     * @param $valor
     */
    public function __construct($idValoracion, $idTipoValoracion, $valor)
    {
        $this->idValoracion = $idValoracion;
        $this->idTipoValoracion = $idTipoValoracion;
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getIdValoracion()
    {
        return $this->idValoracion;
    }

    /**
     * @return mixed
     */
    public function getIdTipoValoracion()
    {
        return $this->idTipoValoracion;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor): void
    {
        $this->valor = $valor;
    }


}