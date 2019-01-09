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
    private $photos;
    private $dir;
    private $newDirectory;
    private $limit;
    private $file;


    public static function house($id) {
        $dir = self::$route . 'casas/' . $id . '/';
        return new self($dir);
    }

    public static function perfil($id) {
        $dir = self::$route . 'perfiles/' . $id . '/';
        return new self($dir);
    }

    public static function me() {
        return self::perfil(Session::get('userID'));
    }

    private function __construct($dir, $limit = 0) {
        $this->init();
        $this->newDirectory = File::newDirectory($dir);
        $this->dir = $dir;
        $this->limit = $limit;
    }

    private function init() {
        $this->fetchAll();
    }

    public function fetchAll() {
        $scanned_directory = array_diff(scandir($this->dir), array('..', '.'));
        foreach ($scanned_directory as $filename) {
            $img = File::getIMG($this->dir, $filename);
            if ($img !== null) {
                $this->photos[] = $img;
            }
        }
        return $this;
    }

    public function getTypes() {
        return $this->imageType;
    }

    public function newDirectoryCreated() {
        return $this->newDirectory;
    }

    public function get() {
        return;
    }

    public function all() {
        return $this->photos;
    }

    public function add($photo) {

    }

    public function verifyType($photo) {
        $imageType = array('.png', '.jpg', '.jpeg');
        $img = $this->dir . $photo;

        foreach ($imageType as $type) {
            if (File::exists($img . $type)) return true;
        }
        return false;
    }

}