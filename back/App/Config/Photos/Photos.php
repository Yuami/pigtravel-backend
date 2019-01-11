<?php
/**
 * Created by PhpStorm.
 * User: JFornes
 * Date: 09/01/2019
 * Time: 22:45
 */

namespace Config\Photos;

use Config\File;
use Config\Session;

class Photos
{
    protected $fileNameClient = 'file';
    protected static $maxSize = 10;
    private $limit;
    private $newDirectory;

    private $fullPath;
    protected $dir = '';
    protected $route = 'public/assets/img/';
    private $routeDir;

    protected $primary = 'primary';
    private $photos = [];
    /**
     * @var Photo
     */
    protected $main;
    protected $imageType = array('png', 'jpg', 'jpeg');

    public function __construct($limit = 0)
    {
        $this->routeDir = $this->route . $this->dir;
        $this->limit = $limit;
        $this->newDirectory = File::newDirectory($this->routeDir);
        $this->fullPath = File::fullPath($this->routeDir) . '\\';
        $this->init();
    }

    public function fetchRandom(): ?Photo
    {
        $all = $this->all();
        if (empty($all)) return null;
        $size = sizeof($all) - 1;
        var_dump($size);
        try {
            $r = random_int(0, $size);
        } catch (\Exception $e) {
            echo 'Empty array';
            return null;
        }
        return $all[$r];
    }

    protected function fullPath()
    {
        return $this->fullPath;
    }

    public function getRoute()
    {
        return $this->route;
    }

    private function init()
    {
        $scanned_directory = array_diff(scandir($this->fullPath), array('..', '.'));

        foreach ($scanned_directory as $filename) {
            if ($this->verifyType($filename)) {
                $photo = $this->toPhoto($filename);
                File::fileName($filename) === $this->primary ?
                    $this->main = $photo : $this->photos[] = $photo;
            }

        }
    }

    protected function toPhoto($name): Photo
    {
        $file = File::toFile($this->routeDir, $name);
        return new Photo($file);
    }

    public function verifyType(string $photo): bool
    {
        return File::verifyType($this->routeDir, $photo, $this->imageType);
    }

    public function overLimit(): bool
    {
        $i = isset($this->primary) ? 1 : 0;
        return $this->limit === 0 ? false : sizeof($this->photos) + $i > $this->limit;
    }

    public static function house($id): HousePhoto
    {
        return HousePhoto::find($id);
    }

    public static function me()
    {
        return self::perfil(Session::get('userID'));
    }

    public static function perfil($id): PerfilPhoto
    {
        return PerfilPhoto::find($id);
    }

    public function allNoMain(): ?array
    {
        return $this->photos;
    }

    public function get(int $id): ?string
    {
        if (isset($this->photos[$id]))
            return $this->photos[$id];
        return null;
    }

    public function all(): ?array
    {
        $temp = $this->photos;
        $temp[] = $this->main;
        return $temp;
    }

    public function main(): ?Photo
    {
        return $this->main;
    }

    public function mainPath()
    {
        return $this->main->path();
    }

    protected function newDirectoryCreated(): bool
    {
        return $this->newDirectory;
    }

    public function upload(File $photo): bool
    {
        if ($this->overLimit() || !$this->verifyType($photo->name())) return false;
        $photo->upload($this->routeDir);
        return true;
    }

    public function uploadAll()
    {
        $photos = File::getUploadeds($this->fileNameClient);
        foreach ($photos as $p) {
            $this->upload($p);
        }
    }
}