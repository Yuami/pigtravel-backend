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

}