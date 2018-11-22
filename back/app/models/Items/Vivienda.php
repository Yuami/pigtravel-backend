<?php
class Vivienda {
    private $id;
    private $nombre;
    private $capacidad;
    private $coordX;
    private $coordY;
    private $metrosCuadrados;
    private $calle;
    private $horaEntrada;
    private $horaSalida;
    private $alquilerAutomatico;
    private $destacada;
    private $idTipoVivienda;
    private $idCiudad;
    private $idVendedor;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getCapacidad() {
        return $this->capacidad;
    }

    /**
     * @param mixed $capacidad
     */
    public function setCapacidad($capacidad): void {
        $this->capacidad = $capacidad;
    }

    /**
     * @return mixed
     */
    public function getCoordX() {
        return $this->coordX;
    }

    /**
     * @param mixed $coordX
     */
    public function setCoordX($coordX): void {
        $this->coordX = $coordX;
    }

    /**
     * @return mixed
     */
    public function getCoordY() {
        return $this->coordY;
    }

    /**
     * @param mixed $coordY
     */
    public function setCoordY($coordY): void {
        $this->coordY = $coordY;
    }

    /**
     * @return mixed
     */
    public function getMetrosCuadrados() {
        return $this->metrosCuadrados;
    }

    /**
     * @param mixed $metrosCuadrados
     */
    public function setMetrosCuadrados($metrosCuadrados): void {
        $this->metrosCuadrados = $metrosCuadrados;
    }

    /**
     * @return mixed
     */
    public function getCalle() {
        return $this->calle;
    }

    /**
     * @param mixed $calle
     */
    public function setCalle($calle): void {
        $this->calle = $calle;
    }

    /**
     * @return mixed
     */
    public function getHoraEntrada() {
        return $this->horaEntrada;
    }

    /**
     * @param mixed $horaEntrada
     */
    public function setHoraEntrada($horaEntrada): void {
        $this->horaEntrada = $horaEntrada;
    }

    /**
     * @return mixed
     */
    public function getHoraSalida() {
        return $this->horaSalida;
    }

    /**
     * @param mixed $horaSalida
     */
    public function setHoraSalida($horaSalida): void {
        $this->horaSalida = $horaSalida;
    }

    /**
     * @return mixed
     */
    public function getAlquilerAutomatico() {
        return $this->alquilerAutomatico;
    }

    /**
     * @param mixed $alquilerAutomatico
     */
    public function setAlquilerAutomatico($alquilerAutomatico): void {
        $this->alquilerAutomatico = $alquilerAutomatico;
    }

    /**
     * @return mixed
     */
    public function getDestacada() {
        return $this->destacada;
    }

    /**
     * @param mixed $destacada
     */
    public function setDestacada($destacada): void {
        $this->destacada = $destacada;
    }

    /**
     * @return mixed
     */
    public function getIdTipoVivienda() {
        return $this->idTipoVivienda;
    }

    /**
     * @param mixed $idTipoVivienda
     */
    public function setIdTipoVivienda($idTipoVivienda): void {
        $this->idTipoVivienda = $idTipoVivienda;
    }

    /**
     * @return mixed
     */
    public function getIdCiudad() {
        return $this->idCiudad;
    }

    /**
     * @param mixed $idCiudad
     */
    public function setIdCiudad($idCiudad): void {
        $this->idCiudad = $idCiudad;
    }

    /**
     * @return mixed
     */
    public function getIdVendedor() {
        return $this->idVendedor;
    }

    public function __toString() {
        return "Prueba ". $this->id . " nombre: ". $this->nombre;
    }
}