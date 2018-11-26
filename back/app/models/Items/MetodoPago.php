<?php

class MetodoPago
{
    private $id;
    private $año;
    private $CVV;
    private $defecto;
    private $email;
    private $IBAN;
    private $mm;
    private $nombreTitular;
    private $numeroTitular;

    /**
     * MetodoPago constructor.
     * @param $id
     * @param $año
     * @param $CVV
     * @param $defecto
     * @param $email
     * @param $IBAN
     * @param $mm
     * @param $nombreTitular
     * @param $numeroTitular
     */
    public function __construct($id, $año, $CVV, $defecto, $email, $IBAN, $mm, $nombreTitular, $numeroTitular)
    {
        $this->id = $id;
        $this->año = $año;
        $this->CVV = $CVV;
        $this->defecto = $defecto;
        $this->email = $email;
        $this->IBAN = $IBAN;
        $this->mm = $mm;
        $this->nombreTitular = $nombreTitular;
        $this->numeroTitular = $numeroTitular;
    }

    /**
     * @return mixed
     */
    public function getAño()
    {
        return $this->año;
    }

    /**
     * @param mixed $año
     */
    public function setAño($año)
    {
        $this->año = $año;
    }

    /**
     * @return mixed
     */
    public function getCVV()
    {
        return $this->CVV;
    }

    /**
     * @param mixed $CVV
     */
    public function setCVV($CVV)
    {
        $this->CVV = $CVV;
    }

    /**
     * @return mixed
     */
    public function getDefecto()
    {
        return $this->defecto;
    }

    /**
     * @param mixed $defecto
     */
    public function setDefecto($defecto)
    {
        $this->defecto = $defecto;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getIBAN()
    {
        return $this->IBAN;
    }

    /**
     * @param mixed $IBAN
     */
    public function setIBAN($IBAN)
    {
        $this->IBAN = $IBAN;
    }

    /**
     * @return mixed
     */
    public function getMm()
    {
        return $this->mm;
    }

    /**
     * @param mixed $mm
     */
    public function setMm($mm)
    {
        $this->mm = $mm;
    }

    /**
     * @return mixed
     */
    public function getNombreTitular()
    {
        return $this->nombreTitular;
    }

    /**
     * @param mixed $nombreTitular
     */
    public function setNombreTitular($nombreTitular)
    {
        $this->nombreTitular = $nombreTitular;
    }

    /**
     * @return mixed
     */
    public function getNumeroTitular()
    {
        return $this->numeroTitular;
    }

    /**
     * @param mixed $numeroTitular
     */
    public function setNumeroTitular($numeroTitular)
    {
        $this->numeroTitular = $numeroTitular;
    }

}