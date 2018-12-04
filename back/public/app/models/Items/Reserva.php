<?php
include "InVivienda.php";
class Reserva implements InVivienda {

    private $id;
    private $checkIn;
    private $checkOut;
    private $fechaReserva;
    private $precio;
    private $totalClientes;
    private $idVivienda;
    private $idMetodoPago;
    private $idCliente;

    public function json() {
        return [
          "id" => $this->id,
          "checkIn" => $this->checkIn,
          "checkOut" => $this->checkOut,
          "fechaReserva" => $this->fechaReserva,
          "precio" => $this->precio,
          "totalClientes" => $this->totalClientes,
          "idVivienda" => $this->idVivienda,
          "idMetodoPago" => $this->idMetodoPago,
          "idCliente" => $this->idCliente,
        ];
    }

    /**
     * Reserva constructor.
     * @param $id
     * @param $checkIn
     * @param $checkOut
     * @param $fechaReserva
     * @param $precio
     * @param $totalClientes
     * @param $idVivienda
     * @param $idMetodoPago
     * @param $idCliente
     */
    public function __construct($id, $checkIn, $checkOut, $fechaReserva, $precio, $totalClientes, $idVivienda, $idMetodoPago, $idCliente) {
        $this->id = $id;
        $this->checkIn = $checkIn;
        $this->checkOut = $checkOut;
        $this->fechaReserva = $fechaReserva;
        $this->precio = $precio;
        $this->totalClientes = $totalClientes;
        $this->idVivienda = $idVivienda;
        $this->idMetodoPago = $idMetodoPago;
        $this->idCliente = $idCliente;
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
    public function getCheckIn() {
        return $this->checkIn;
    }

    /**
     * @param mixed $checkIn
     */
    public function setCheckIn($checkIn): void {
        $this->checkIn = $checkIn;
    }

    /**
     * @return mixed
     */
    public function getCheckOut() {
        return $this->checkOut;
    }

    /**
     * @param mixed $checkOut
     */
    public function setCheckOut($checkOut): void {
        $this->checkOut = $checkOut;
    }

    /**
     * @return mixed
     */
    public function getFechaReserva() {
        return $this->fechaReserva;
    }

    /**
     * @param mixed $fechaReserva
     */
    public function setFechaReserva($fechaReserva): void {
        $this->fechaReserva = $fechaReserva;
    }

    /**
     * @return mixed
     */
    public function getPrecio() {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio): void {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getTotalClientes() {
        return $this->totalClientes;
    }

    /**
     * @param mixed $totalClientes
     */
    public function setTotalClientes($totalClientes): void {
        $this->totalClientes = $totalClientes;
    }

    /**
     * @return mixed
     */
    public function getIdVivienda() {
        return $this->idVivienda;
    }

    /**
     * @return mixed
     */
    public function getIdMetodoPago() {
        return $this->idMetodoPago;
    }

    /**
     * @param mixed $idMetodoPago
     */
    public function setIdMetodoPago($idMetodoPago): void {
        $this->idMetodoPago = $idMetodoPago;
    }

    /**
     * @return mixed
     */
    public function getIdCliente() {
        return $this->idCliente;
    }

    public static function getAllByVivienda($id) {
        // TODO: Implement getAllByVivienda() method.
    }
}