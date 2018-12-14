<?php

class Mensajes
{

    private static $idSender;
    private static $idReceiver;
    private static $mensaje;
    private static $fechaEnviado;

    public static function getIdSender()
    {
        return self::$idSender;
    }

    /**
     * @param mixed $idSender
     */
    public static function setIdSender($idSender): void
    {
        self::$idSender = $idSender;
    }

    /**
     * @return mixed
     */
    public static function getIdReceiver()
    {
        return self::$idReceiver;
    }

    /**
     * @param mixed $idReceiver
     */
    public static function setIdReceiver($idReceiver): void
    {
        self::$idReceiver = $idReceiver;
    }

    /**
     * @return mixed
     */
    public static function getMensaje()
    {
        return self::$mensaje;
    }

    /**
     * @param mixed $mensaje
     */
    public static function setMensaje($mensaje): void
    {
        self::$mensaje = $mensaje;
    }

    /**
     * @return mixed
     */
    public static function getFechaEnviado()
    {
        return self::$fechaEnviado;
    }

    /**
     * @param mixed $fechaEnviado
     */
    public static function setFechaEnviado($fechaEnviado): void
    {
        self::$fechaEnviado = $fechaEnviado;
    }

}