<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 21/11/2018
 * Time: 9:17
 */

namespace Model\Items;

use Model\DAO\LiniaPoliticaCancelacionDAO;

class PoliticaCancelacion
{
    private $id;
    private $nombre;
    private $idVivienda;

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

    public function getLinias()
    {
        return LiniaPoliticaCancelacionDAO::getByIdPolitica($this->id);
    }

}