<?php

class File
{

    public static function exists($file)
    {
        if (file_exists($file)) {
            return true;
        }
        return false;
    }

    public static function setProfileImage($id, $image)
    {
        $file = PERFIL . $id . ".png";
        file_put_contents($file, $image);
        return $file;
    }

    public static function setRandomImageByName($name, $surname, $id, $size = 128)
    {
        return self::setProfileImage($id, file_get_contents("https://ui-avatars.com/api/?name=" . $name . "+" . $surname .  "&size=" . $size));
    }

    public static function getProfileImage($persona): string
    {
        $imageType = array('.png', '.jpg', '.jpeg');
        $id = $persona->getId();
        $name = $persona->getNombre();
        $surname = $persona->getApellido1();

        foreach ($imageType as $type) {
            if (self::exists(PERFIL . $id . $type)) {
                return "/" . PERFIL . $id . $type;
            }
        }
        return self::setRandomImageByName($name, $surname, $id);
    }
}
