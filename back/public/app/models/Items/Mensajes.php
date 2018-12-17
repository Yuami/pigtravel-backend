<?php

class Mensajes
{

    private $idSender;
    private $idReceiver;
    private $mensaje;
    private $fechaEnviado;

    public function getIdSender()
    {
        return self::$idSender;
    }

    /**
     * @param mixed $idSender
     */
    public function setIdSender($idSender): void
    {
        self::$idSender = $idSender;
    }

    /**
     * @return mixed
     */
    public function getIdReceiver()
    {
        return self::$idReceiver;
    }

    /**
     * @param mixed $idReceiver
     */
    public function setIdReceiver($idReceiver): void
    {
        self::$idReceiver = $idReceiver;
    }

    /**
     * @return mixed
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * @param mixed $mensaje
     */
    public function setMensaje($mensaje): void
    {
        self::$mensaje = $mensaje;
    }

    /**
     * @return mixed
     */
    public function getFechaEnviado()
    {
        return self::$fechaEnviado;
    }

    /**
     * @param mixed $fechaEnviado
     */
    public function setFechaEnviado($fechaEnviado): void
    {
        self::$fechaEnviado = $fechaEnviado;
    }

}