<?php

class MetodoPago {
    private $id;
    private $año;
    private $CVV;
    private $defecto;
    private $email;
    private $IBAN;
    private $mm;
    private $nombreTitular;
    private $numeroTitular;

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

    public function getNumeroTitular()
    {
        return $this->numeroTitular;
    }
    
    public function setNumeroTitular($numeroTitular)
    {
        $this->numeroTitular = $numeroTitular;

        return $this;
    }

       public function getNombreTitular()
    {
        return $this->nombreTitular;
    }
    
    public function setNombreTitular($nombreTitular)
    {
        $this->nombreTitular = $nombreTitular;

        return $this;
    }

    public function getMm()
    {
        return $this->mm;
    }

    public function setMm($mm)
    {
        $this->mm = $mm;

        return $this;
    }
 
    public function getIBAN()
    {
        return $this->IBAN;
    }

    public function setIBAN($IBAN)
    {
        $this->IBAN = $IBAN;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
   
    public function getDefecto()
    {
        return $this->defecto;
    }
    
    public function setDefecto($defecto)
    {
        $this->defecto = $defecto;

        return $this;
    }
   
    public function getCVV()
    {
        return $this->CVV;
    }
 
    public function setCVV($CVV)
    {
        $this->CVV = $CVV;

        return $this;
    }
    
    public function getAño()
    {
        return $this->año;
    }

     public function setAño($año)
    {
        $this->año = $año;

        return $this;
    }
}