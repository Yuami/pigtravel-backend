<?php

namespace Model\Items;

use Model\DAO\PersonaDAO;
use Model\DAO\ReservaHasEstadoDAO;
use Model\DAO\ViviendaDAO;

class Reserva
{

    private $id;
    private $checkIn;
    private $checkOut;
    private $fechaReserva;
    private $precio;
    private $totalClientes;
    private $idVivienda;
    private $idMetodoPago;
    private $idCliente;

    public function json()
    {
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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCheckIn()
    {
        return $this->checkIn;
    }

    /**
     * @param mixed $checkIn
     */
    public function setCheckIn($checkIn): void
    {
        $this->checkIn = $checkIn;
    }

    /**
     * @return mixed
     */
    public function getCheckOut()
    {
        return $this->checkOut;
    }

    /**
     * @param mixed $checkOut
     */
    public function setCheckOut($checkOut): void
    {
        $this->checkOut = $checkOut;
    }

    /**
     * @return mixed
     */
    public function getFechaReserva()
    {
        return $this->fechaReserva;
    }
    public function getFechaReservaFormat()
    {
        $this->fechaReserva= date("d/m/y");
        return $this->fechaReserva;
    }
    public function getFechaReservaYear()
    {
        $this->fechaReserva= date("Y");
        return $this->fechaReserva;
    }
    public function getFechaReservaMonth()
    {
        $this->fechaReserva= date("m");
        return $this->fechaReserva;
    }

    /**
     * @param mixed $fechaReserva
     */
    public function setFechaReserva($fechaReserva): void
    {
        $this->fechaReserva = $fechaReserva;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getTotalClientes()
    {
        return $this->totalClientes;
    }

    /**
     * @param mixed $totalClientes
     */
    public function setTotalClientes($totalClientes): void
    {
        $this->totalClientes = $totalClientes;
    }

    /**
     * @return mixed
     */
    public function getIdVivienda()
    {
        return $this->idVivienda;
    }

    /**
     * @return mixed
     */
    public function getIdMetodoPago()
    {
        return $this->idMetodoPago;
    }

    /**
     * @param mixed $idMetodoPago
     */
    public function setIdMetodoPago($idMetodoPago): void
    {
        $this->idMetodoPago = $idMetodoPago;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @return Vivienda
     */
    public function getVivienda(): Vivienda
    {
        return ViviendaDAO::getById($this->idVivienda);
    }

    /**
     * @return Persona
     */
    public function getCliente(): Persona
    {
        return PersonaDAO::getById($this->idCliente);
    }

    /**
     * @return Persona
     */
    public function getVendedor(): Persona
    {
        return PersonaDAO::getById($this->getVivienda()->getIdVendedor());
    }

    public function getCambios()
    {
        $estados = ReservaHasEstado::getEstadosByReserva($this);
        $result = [];
        foreach ($estados as $estado) {
            $result[] = ["estado" => $estado->getNombre(), "fechaCambio" => $estado->getFechaCambio()];
        }
        return $result;
    }

    public function getCambiosJSON()
    {
        $estados = ReservaHasEstado::getEstadosByReserva($this);
        $result = [];
        foreach ($estados as $estado) {
            $result[] = ["estado" => $estado->getNombre(), "fechaCambio" => $estado->getFechaCambio()];
        }
        return json_encode($result);
    }

    /**
     * @return String
     */
    public function getNombreEstado()
    {
        return ReservaHasEstado::getLastEstado($this);
    }

    public function getCalculo()
    {
        return $this->precio . " * 0.95 - 5 = " . $this->getIngreso();
    }

    public function getDias()
    {
        $checkIn = new \DateTime($this->checkIn);
        $checkOut = new \DateTime($this->checkOut);
        $diff = date_diff($checkIn, $checkOut, true);

        return $diff->days;
    }

    public function getMedia()
    {
        return $this->precio / $this->getDias();
    }

    public function getIngreso()
    {
        return $this->precio * 0.95 - 5;
    }

    public function link()
    {
        return '/reservations/' . $this->getId();
    }
}