<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 21/11/2018
 * Time: 9:17
 */

namespace Model\Items;

class PoliticaCancelacion
{
    private $id;
    private $nombre;
    private $idVendedor;

    /**
     * @return mixed
     */
    public function getIdVendedor()
    {
        return $this->idVendedor;
    }

    /**
     * @param mixed $idVendedor
     */
    public function setIdVendedor($idVendedor)
    {
        $this->idVendedor = $idVendedor;
    }

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