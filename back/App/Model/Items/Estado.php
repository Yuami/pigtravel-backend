<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 21/11/2018
 * Time: 9:17
 */
namespace Model\Items;

use Model\DAO\EstadoHasIdiomaDAO;

class Estado {
    private $id;

    public function getID()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return EstadoHasIdiomaDAO::getNombre($this->id)->getNombre();
    }
}