<?php
/**
 * Created by PhpStorm.
 * User: Pep Toni
 * Date: 19/11/2018
 * Time: 19:45
 */

class Valoracion_Vivienda
{
    private $id;
    private $mensaje;

    public function __construct($id, $mensaje)
    {
        $this->id = $id;
        $this->mensaje = $mensaje;
    }

    public function getMensaje()
    {
        return $this->nombre;
    }

    public function setMensaje($mensaje): void
    {
        $this->nombre = $mensaje;
    }


}