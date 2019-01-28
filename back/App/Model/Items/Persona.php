<?php
namespace Model\Items;

use Config\Photos\PerfilPhoto;
use Model\DAO\VendedorDAO;

class Persona {
    private $nombre;
    private $id;
    private $apellido1;
    private $apellido2;
    private $DNI;
    private $tlf;
    private $correo;
    private $password;
    private $fechaNacimiento;
    private $descripcion;
    private $idCiudad;
    private $idFoto;

    /**
     * @return mixed
     */
    public function getIdCiudad()
    {
        return $this->idCiudad;
    }

    /**
     * @param mixed $idCiudad
     */
    public function setIdCiudad($idCiudad): void
    {
        $this->idCiudad = $idCiudad;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

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

    public function getNombreCompleto()
    {
        $string = $this->nombre . " " . $this->apellido1 . " ";
        $string .= $this->apellido2 == null ? "" : $this->apellido2;
        return $string;
    }

    public function getIdFoto()
    {
        return $this->idFoto;
    }

    public function image()
    {
        return PerfilPhoto::find($this->id)->mainPath();
    }

    public function setVendedor()
    {
        return VendedorDAO::insert([
            "idPersona" => $this->id
            ]);
    }

}