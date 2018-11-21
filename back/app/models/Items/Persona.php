<?php

class Persona {
    private $tipoPersona= array();
    private $nombre;
    private $id;
    private $apellido1;
    private $apellido2;
    private $DNI;
    private $tlf;
    private $correo;
    private $password;
    private $fechaNacimiento;

    /**
     * Persona constructor.
     * @param array $tipoPersona
     * @param $nombre
     * @param $id
     * @param $apellido1
     * @param $apellido2
     * @param $DNI
     * @param $tlf
     * @param $correo
     * @param $password
     * @param $fechaNacimiento
     */
    public function __construct(array $tipoPersona, $nombre, $id, $apellido1, $apellido2, $DNI, $tlf, $correo, $password, $fechaNacimiento)
    {
        $this->tipoPersona = $tipoPersona;
        $this->nombre = $nombre;
        $this->id = $id;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->DNI = $DNI;
        $this->tlf = $tlf;
        $this->correo = $correo;
        $this->password = $password;
        $this->fechaNacimiento = $fechaNacimiento;
    }

    /**
     * @return array
     */
    public function getTipoPersona()
    {
        return $this->tipoPersona;
    }

    /**
     * @param array $tipoPersona
     */
    public function setTipoPersona($tipoPersona)
    {
        $this->tipoPersona = $tipoPersona;
    }

    public function isCliente(){
        return $this->tipoPersona['cliente'];
    }

    public function isEmpleado(){
        return $this->tipoPersona['empleado'];
    }

    public function isVendedor(){
        return $this->tipoPersona['vendedor'];
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

    /**
     * @return mixed
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * @param mixed $apellido1
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;
    }

    /**
     * @return mixed
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * @param mixed $apellido2
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;
    }

    /**
     * @return mixed
     */
    public function getDNI()
    {
        return $this->DNI;
    }

    /**
     * @param mixed $DNI
     */
    public function setDNI($DNI)
    {
        $this->DNI = $DNI;
    }

    /**
     * @return mixed
     */
    public function getTlf()
    {
        return $this->tlf;
    }

    /**
     * @param mixed $tlf
     */
    public function setTlf($tlf)
    {
        $this->tlf = $tlf;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param mixed $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }


}