<?php

namespace Config;

use Model\DAO\FotoDAO;

class File
{

    private static function upFoto($upload, $path)
    {
        $name = '/' . $path . '/' . $upload->getName() . '.' . $upload->getMime();
        return FotoDAO::insert([
            'path' => $name
        ]);
    }

    public static function uploadAllPhotos($name, $path)
    {
        $uploads = File::getFileSubmited($name);
        $photos = [];
        foreach ($uploads as $upload) {
            $image = new \Bulletproof\Image($upload);
            $image->setLocation(ROOT . $path);
            $upload = $image->upload();

            if ($upload) {
                $photos[] = self::upFoto($upload, $path);
            }
        }
        return $photos;
    }

    public static function uploadPhoto($name, $path)
    {
        $uploads = File::getFileSubmited($name);
        foreach ($uploads as $upload) {
            $image = new \Bulletproof\Image($upload);
            $image->setLocation(ROOT . $path);
            $upload = $image->upload();

            if ($upload) {
                return self::upFoto($upload, $path);
            }
        }
        return null;
    }


    private static function reArrayFiles(array $arr) : array
    {
        $new = [];
        foreach ($arr as $key => $all) {
            foreach ($all as $i => $val) {
                $new[$i][$key] = $val;
            }
        }
        return $new;
    }

    public static function size($path)
    {
        return self::exists($path) ? filesize($path) : null;
    }

    public static function get()
    {
        return $_FILES;
    }

    public static function getFileSubmited($name) : ?array
    {
        if (isset($_FILES[$name]['name']) && is_array($_FILES[$name]['name'])) {
            $file_ary = self::reArrayFiles($_FILES[$name]);
        } else {
            if (isset($_FILES[$name]["name"])) {
                $filename = $_FILES[$name]["name"];
                $tmp = $_FILES[$name]["tmp_name"];
                $size = $_FILES[$name]["size"];
                $fileType = $_FILES[$name]['type'];
                $error = $_FILES[$name]['error'];
                $file_ary = [['name' => $filename, 'type' => $fileType, 'tmp_name' => $tmp, 'error' => $error, 'size' => $size]];
            } else {
                $file_ary = [];
            }
        }
        return $file_ary;
    }

    public static function exists(string $path) : bool
    {
        return file_exists($path);
    }

    public static function fetchAll($dir)
    {
        return array_diff(scandir($dir), array('..', '.'));
    }

    public static function verifyType(string $path, string $file, array $fileTypes) : bool
    {
        $fullPath = self::fullPath($path, $file);
        return File::exists($fullPath) ? in_array(File::extension($file), $fileTypes) : false;
    }

    public static function fullPath($dir, $filename = '') : string
    {
        return File::real(self::rootIt($dir . '/' . $filename));
    }


    public static function rootIt(string $path) : string
    {
        return BACK . $path;
    }

    public static function real($path)
    {
        return realpath($path);
    }

    public static function newDirectory($path) : bool
    {
        $path = self::rootIt($path) . '/';
        if (self::exists($path)) return false;
        mkdir($path, 0777);
        return true;
    }

    public static function setProfileImage($id, $image)
    {
        $file = PERFIL . $id . ".png";
        file_put_contents($file, $image);
        return $file;
    }

    public static function setRandomImageByName($name, $surname, $id, $size = 128)
    {
        return self::setProfileImage($id, file_get_contents("https://api.adorable.io/avatars/" . $size . "/" . $id . ".png"));
    }

    public static function extension(string $path) : ?string
    {
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    public static function deleteExtension(string $path)
    {
        return self::fileName($path);
    }

    public static function fileName(string $path)
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }

    public static function type($path) : ?string
    {
        return self::exists($path) ? filetype($path) : null;
    }

    public static function dir($path)
    {
        return pathinfo($path, PATHINFO_DIRNAME);
    }

    public static function MBtoB($n)
    {
        return $n * 1000000;
    }
}
