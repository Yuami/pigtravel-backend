<?php
namespace Model\Items;
class Foto
{
    private $id;
    private $path;
    private $back;
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
        if (!$this->getBack())
            return "http://pigtravel.top" . $this->path;
        return $this->path;
    }

    public function getBack(){
        return $this->back;
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
