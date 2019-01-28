<?php
namespace Model\Items;

class Mensaje
{
    private $id;
    private $idVivienda;
    private $idSender;
    private $idReciever;
    private $mensaje;
    private $fechaEnviado;
    private $leido;
    public function getId()
    {
        return $this->id;
    }
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
        $d=explode(" ",$this->fechaEnviado)[0];
        return $d;
    }
    public function getDiaEnviado()
    {
        $d=explode(" ",$this->fechaEnviado)[0];
        $dd=explode("-",$d)[1]."-".explode("-",$d)[2];
        return $dd;
    }
    public function getLeido()
    {
        return $this->leido;
    }


}