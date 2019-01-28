<?php
namespace Model\Items;
class Foto
{
    private $id;
    private $path;

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

    public static function defaultPerfil()
    {
        return '/assets/uploads/img/perfiles/default-image.png';
    }

    public static function defaultCasa()
    {
        return '/assets/uploads/img/casas/default-image.jpg';
    }
}
