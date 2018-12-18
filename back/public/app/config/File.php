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
        return self::setProfileImage($id, file_get_contents("https://api.adorable.io/avatars/" .  $size . "/" . $id . ".png" ));
    }

    public static function getProfileImage($persona): string {
        $id = $persona->getId();
        $name = $persona->getNombre();
        $surname = $persona->getApellido1();

        $img = self::getIMG(PERFIL, $id);
        if ($img != null){
            return $img;
        }
        return self::setRandomImageByName($name, $surname, $id);
    }

    public static function getProfileImageById($idPersona) {
        include_once DAO . "PersonaDAO.php";
        include_once ITEM . "Persona.php";
        $persona = PersonaDAO::getById($idPersona);
        return self::getProfileImage($persona);
    }

    public static function getIMG($route, $name){
        $imageType = array('.png', '.jpg', '.jpeg');
        $img = $route . $name;
        foreach ($imageType as $type) {
            if (self::exists(ROOT . $img . $type)) {
                return $img . $type;
            }
        }
        return null;
    }

    public static function getMainHouseImage($houseID): string {
        define("HOUSEIMG", "img/casas/");
        $img = self::getIMG(HOUSEIMG, $houseID);
        if ($img != null){
            return $img;
        }
        return HOUSEIMG . "placeholder.jpg";
    }
}
