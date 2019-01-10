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
    private $dir;
    private $size;

    public static function find(string $id)
    {
        return new self($id);
    }

    protected function __construct(string $id, $limit = 3)
    {
        $this->dir = 'perfiles/' . $id . '/';
        parent::__construct($this->dir, $limit);
        if ($this->main() == null){
            return self::setProfileImage($id, file_get_contents("https://api.adorable.io/avatars/" . $size . "/" . $id . ".png"));
        }
    }

    public static function setProfileImage($id, $image)
    {
        $file = PERFIL . $id . ".png";
        file_put_contents($file, $image);
        return $file;
    }
}