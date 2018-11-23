<?php
include "../DAO/ValoracionClienteDAO.php";

class ValoracionCliente
{
    private static $idVendedor;
    private static $idCliente;
    private static $mensaje;
    private static $bien;

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

    public static function getByIdCliente($idCliente)
    {
        return ValoracionClienteDAO::getByIdCliente($idCliente);
    }

    public static function getByIdClienteTime($idCliente)
    {
        return ValoracionClienteDAO::getByIdClienteTime($idCliente);
    }
}

