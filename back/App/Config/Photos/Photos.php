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
    protected static $maxSize = 10;
    private $limit;
    private $newDirectory;

    private $fullPath;
    private $dir;
    protected $route = 'public/img/';
    private $routeDir;

    protected $primary = 'primary';
    private $photos = [];
    /**
     * @var Photo
     */
    protected $main;
    protected $imageType = array('png', 'jpg', 'jpeg');

    public function __construct($dir, $limit = 0)
    {
        $this->routeDir = $this->route . $dir;
        $this->dir = $dir;
        $this->limit = $limit;
        $this->newDirectory = File::newDirectory($this->routeDir);
        $this->fullPath = File::fullPath($this->routeDir) . '\\';
        $this->init();
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

    private function toPhoto($name): Photo
    {
        $file = File::find($name, $this->routeDir, self::$maxSize);
        return new Photo($file);
    }

    protected function verifyType(string $photo): bool
    {
        $img = $this->fullPath . $photo;
        return File::exists($img) ? in_array(File::extension($img), $this->imageType) : false;
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

    public static function perfil($id) : PerfilPhoto
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

    public function main() : ?Photo
    {
        return $this->main;
    }

    public function mainPath()
    {
        return $this->main->get();
    }

    protected function newDirectoryCreated(): bool
    {
        return $this->newDirectory;
    }

    public function upload(File $photo): bool
    {
        if ($this->overLimit()) return false;

        return true;
    }
}