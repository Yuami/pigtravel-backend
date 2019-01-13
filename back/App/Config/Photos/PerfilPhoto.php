<?php
/**
 * Created by PhpStorm.
 * User: JFornes
 * Date: 09/01/2019
 * Time: 21:26
 */

namespace Config\Photos;


class PerfilPhoto extends Photos
{
    protected $defaultMain = '/assets/img/perfiles/default-image.png';
    protected $fileNameClient = 'photoPerfil';
    private $size = 128;

    public static function find(string $id)
    {
        return new self($id);
    }

    protected function __construct(string $id, $limit = 3)
    {
        $dir = 'perfiles/' . $id . '/';
        parent::__construct($dir, $limit);
//        $this->defaultIfNotExists($id);
    }

    public function defaultIfNotExists($id)
    {
        if ($this->main() == null) {
            self::setProfileImage(file_get_contents("https://api.adorable.io/avatars/" . $this->size . "/" . $id . ".png"));
        }
    }

    public function setProfileImage($image)
    {
        $file = $this->fullPath() . 'main.png';
        file_put_contents($file, $image);
        $this->main = $this->toPhoto('main.png');
        $this->noMain = false;
    }
}