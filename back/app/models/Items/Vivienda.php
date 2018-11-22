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
     * Vivienda constructor.
     * @param $id
     * @param $nombre
     * @param $capacidad
     * @param $coordX
     * @param $coordY
     * @param $metrosCuadrados
     * @param $calle
     * @param $horaEntrada
     * @param $horaSalida
     * @param $alquilerAutomatico
     * @param $destacada
     * @param $idTipoVivienda
     * @param $idCiudad
     * @param $idVendedor
     */
//    public function __construct($id, $nombre, $capacidad, $coordX, $coordY, $metrosCuadrados, $calle, $horaEntrada, $horaSalida, $alquilerAutomatico, $destacada, $idTipoVivienda, $idCiudad, $idVendedor) {
//        $this->id = $id;
//        $this->nombre = $nombre;
//        $this->capacidad = $capacidad;
//        $this->coordX = $coordX;
//        $this->coordY = $coordY;
//        $this->metrosCuadrados = $metrosCuadrados;
//        $this->calle = $calle;
//        $this->horaEntrada = $horaEntrada;
//        $this->horaSalida = $horaSalida;
//        $this->alquilerAutomatico = $alquilerAutomatico;
//        $this->destacada = $destacada;
//        $this->idTipoVivienda = $idTipoVivienda;
//        $this->idCiudad = $idCiudad;
//        $this->idVendedor = $idVendedor;
//    }

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


//
//header("Content-Type: application/json");
//
//function reservaRandom(){
//    $precio = random_int(40,200);
//    $clientes = random_int(1,6);
//    $cliente = random_int(1,10);
//    $checkIn = randomFecha();
//    $checkOut = randomFecha();
//    $fechaReserva = randomFecha();
//    return new Reserva(1, $checkIn, $checkOut, $fechaReserva, $precio, $clientes,1,2,$cliente);
//}
//
//function randomFecha(){
//    return random_int(1,28) . "-" . random_int(1,12) . "-" . random_int(10,18);
//}
//
//function arrayReservas() : array {
//    $random = random_int(1,20);
//    for ($i = 0; $i < $random; $i++){
//        $arr[] = reservaRandom();
//    }
//    return $arr;
//}
//
//$resevas = arrayReservas();
//$vivienda = new Vivienda(1,"Hola",3,200,"13:00","12:00",234,
//    456,"Mi calle", true, false, 1,2, arrayReservas());
//
//echo json_encode($vivienda->json());