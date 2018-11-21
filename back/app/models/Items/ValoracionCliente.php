<?php

class ValoracionCliente
{

    private $idVendedor;
    private $idCliente;
    private $mensaje;
    private $bien;

    public function __construct($idVendedor, $idCliente, $mensaje, $bien)
    {
        $this->idVendedor = $idVendedor;
        $this->idCliente = $idCliente;
        $this->mensaje = $mensaje;
        $this->bien = $bien;
    }


    public function getIdVendedor()
    {
        return $this->idVendedor;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function getIdMensaje()
    {
        return $this->idMensaje;
    }

    public function getBien()
    {
        return $this->bien;
    }

    public function setMensaje($mensaje): void
    {
        $this->mensaje = $mensaje;
    }

    public function setBien($bien): void
    {
        $this->bien = $bien;
    }

}