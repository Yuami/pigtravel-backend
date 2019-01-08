<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 07/01/2019
 * Time: 9:36
 */

namespace Config;


class Photo {
    private static $route = ROOT . 'img/';
    private $imageType = array('png', 'jpg', 'jpeg');
    private $dir;
    private $files;
    private $newDirectory;

    private function __construct($dir) {
        $this->newDirectory = File::newDirectory($dir);
        $this->dir = $dir;
    }

    public function getTypes() {
        return $this->imageType;
    }

    public function newDirectoryCreated() {
        return $this->newDirectory;
    }

    public function all() {
        $scanned_directory = array_diff(scandir($this->dir), array('..', '.'));
        foreach ($scanned_directory as $filename) {
            $img = File::getIMG($this->dir, $filename);
            if ($img !== null) {
                $this->files[] = $img;
            }
        }
        return $this;
    }



    public function new($file) {

    }

    public function get() {
        return $this->files;
    }

    public static function house($id) {
        $dir = self::$route . 'casas/' . $id . '/';
        return new self($dir);
    }


}