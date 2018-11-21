<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 21/11/2018
 * Time: 8:38
 */

class Vivienda {
    private $id;
    private $nombre;
    private $capacidad;
    private $mCuadrados;
    private $horaEntrada;
    private $horaSalida;
    private $alquilerAutomatico;
    private $destacada;
    private $idPropietario;

    private $baños;
    private $valoraciones;
    private $reservas;
    private $habitaciones;
    private $localizacion;

    /**
     * Vivienda constructor.
     * @param $id
     * @param $nombre
     * @param $capacidad
     * @param $mCuadrados
     * @param $horaEntrada
     * @param $horaSalida
     * @param $calle
     * @param $alquilerAutomatico
     * @param $destacada
     * @param $idPropietario
     */
    public function __construct($id, $nombre, $capacidad, $mCuadrados, $horaEntrada, $horaSalida, $x, $y, $calle,
                                $alquilerAutomatico, $destacada, $idPropietario, $idCiudad) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->capacidad = $capacidad;
        $this->mCuadrados = $mCuadrados;
        $this->horaEntrada = $horaEntrada;
        $this->horaSalida = $horaSalida;
        $this->alquilerAutomatico = $alquilerAutomatico;
        $this->destacada = $destacada;
        $this->idPropietario = $idPropietario;

        $this->initLocalizacion($x, $y, $calle, $idCiudad);
        $this->habitaciones = $this->getAllHabitaciones();
        $this->valoraciones = Valoracion::getAllValoraciones();
        $this->reservas = Reserva::getAllReservas();
    }


    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getValoraciones() {
        return $this->valoraciones;
    }

    /**
     * @return mixed
     */
    public function getReservas() {
        return $this->reservas;
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
    public function getMCuadrados() {
        return $this->mCuadrados;
    }

    /**
     * @param mixed $mCuadrados
     */
    public function setMCuadrados($mCuadrados): void {
        $this->mCuadrados = $mCuadrados;
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
    public function getBaños() {
        return $this->baños;
    }

    /**
     * @param mixed $baños
     */
    public function setBaños($baños): void {
        $this->baños = $baños;
    }

    /**
     * @return mixed
     */
    public function getHabitaciones() {
        return $this->habitaciones;
    }

    /**
     * @param mixed $habitaciones
     */
    public function setHabitaciones($habitaciones): void {
        $this->habitaciones = $habitaciones;
    }

    /**
     * @return mixed
     */
    public function getLocalizacion() {
        return $this->localizacion;
    }

    /**
     * @param mixed $localizacion
     */
    public function setLocalizacion($localizacion): void {
        $this->localizacion = $localizacion;
    }

    private function initLocalizacion($x, $y, $calle, $ciudad) {
        $this->localizacion = new Localizacion($x, $y, $calle, $ciudad);
    }

}