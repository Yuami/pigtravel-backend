<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 21/11/2018
 * Time: 9:17
 */
namespace Model\Items;

class Idioma
{
    private $id;
    private $nombre;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function json() {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre
        ];
    }

    public static function listJSON(array $idiomas) {
        foreach ($idiomas as $idioma){
            $listIdiomas[] = $idioma->json();
        }
        return $listIdiomas;
    }
}