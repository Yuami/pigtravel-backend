<?php

namespace Config;

use Model\DAO\PersonaDAO;
use Model\Items\Persona;

class File {
    private static $files = [];

    public static function exists($file) : bool {
        if (file_exists($file)) {
            return true;
        }
        return false;
    }

    public static function fetchAll($dir) {
        $scanned_directory = array_diff(scandir($dir), array('..', '.'));
        foreach ($scanned_directory as $filename) {
            if (self::exists(ROOT . $filename)) {
                self::$files[] = self::rootIt($dir, $filename);
            }
        }
        return self::$files;
    }

    public static function rootIt($dir,$filename) {
        return ROOT . $dir . $filename;
    }

    public static function newDirectory($path) : bool {
        if (self::exists($path)) return false;
        mkdir($path, 0777, true);
        return true;
    }

    public static function upload($path, $id, $file) {
        $target_file = $path . basename($_FILES[$id]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($image["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    public static function uploadImage($path, $id, $image) {
        $target_file = $path . basename($_FILES[$id]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($image["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }


    public static function setProfileImage($id, $image) {
        $file = PERFIL . $id . ".png";
        file_put_contents($file, $image);
        return $file;
    }

    public static function setRandomImageByName($name, $surname, $id, $size = 128) {
        return self::setProfileImage($id, file_get_contents("https://api.adorable.io/avatars/" . $size . "/" . $id . ".png"));
    }

    public static function getProfileImage(Persona $persona) : string {
        $id = $persona->getId();
        $name = $persona->getNombre();
        $surname = $persona->getApellido1();

        $img = self::getIMG(PERFIL, $id);
        if ($img != null) {
            return $img;
        }
        return self::setRandomImageByName($name, $surname, $id);
    }

    public static function getProfileImageById($idPersona) {
        $persona = PersonaDAO::getById($idPersona);
        return self::getProfileImage($persona);
    }

    public static function getIMG($route, $name) {
        $imageType = array('.png', '.jpg', '.jpeg');
        $img = $route . $name;
        foreach ($imageType as $type) {
            if (self::exists(ROOT . $img . $type)) {
                return $img . $type;
            }
        }
        return null;
    }

    public static function getMainHouseImage($houseID) : string {
        define("HOUSEIMG", "img/casas/");
        $img = self::getIMG(HOUSEIMG, $houseID);
        if ($img != null) {
            return $img;
        }
        return HOUSEIMG . "placeholder.jpg";
    }
}
