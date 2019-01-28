<?php
/**
 * Created by PhpStorm.
 * User: JFornes
 * Date: 16/01/2019
 * Time: 11:39
 */

namespace Model\Items;


class Fotos
{
    private $id;
    private $path;
    private $posicion;
    private $idVivienda;

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
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getIdVivienda()
    {
        return $this->idVivienda;
    }

}