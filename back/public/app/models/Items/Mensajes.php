<?php

class Mensajes
{
    private $idVivienda;
    private $idSender;
    private $idReciever;
    private $mensaje;
    private $fechaEnviado;

    public function getIdSender()
    {
        return $this->idSender;
    }
    public function getIdVivienda()
    {
        return $this->idVivienda;
    }

    public function getIdReciever()
    {
        return $this->idReciever;
    }
    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function getFechaEnviado()
    {
        return $this->fechaEnviado;
    }



}