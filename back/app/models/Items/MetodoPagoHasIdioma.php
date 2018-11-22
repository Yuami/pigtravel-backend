<?php

class MetodoPagoHasIdioma {
    private $idIdioma;
    private $idMetodoPago;
    private $nombre;

    /**
     * MetodoPagoHasIdioma constructor.
     * @param $idIdioma
     * @param $idMetodoPago
     * @param $nombre
     */
    public function __construct($idIdioma, $idMetodoPago, $nombre)
    {
        $this->idIdioma = $idIdioma;
        $this->idMetodoPago = $idMetodoPago;
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


}