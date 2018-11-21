<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 21/11/2018
 * Time: 8:58
 */

class Localizacion {
    private $x;
    private $y;
    private $calle;
    private $ciudad;

    /**
     * Localizacion constructor.
     * @param $x
     * @param $y
     * @param $calle
     * @param $ciudad
     */
    public function __construct($x, $y, $calle, $ciudad) {
        $this->x = $x;
        $this->y = $y;
        $this->calle = $calle;
        $this->ciudad = $ciudad;
    }

    /**
     * @return mixed
     */
    public function getX() {
        return $this->x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x): void {
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function getY() {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y): void {
        $this->y = $y;
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
    public function getCiudad() {
        return $this->ciudad;
    }

    /**
     * @param mixed $ciudad
     */
    public function setCiudad($ciudad): void {
        $this->ciudad = $ciudad;
    }

}