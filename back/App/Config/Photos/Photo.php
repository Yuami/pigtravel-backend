<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 07/01/2019
 * Time: 9:36
 */

namespace Config\Photos;


use Config\File;

class Photo
{
    /**
     * @var string
     */
    private $limit;
    private $file;

    public function __construct(File $file , int $limit = 0)
    {
        $this->limit = $limit;
        $this->file = $file;
    }

    public function path() : string
    {
        return $this->domainPath();
    }

    public function me() : File
    {
        return $this->file;
    }

    public function rename($name) : self
    {
        $this->me()->rename($name);
        return $this;
    }

    public function changeNames(Photo $photo) :self
    {
        $this->me()->changeNames($photo->me());
        return $this;
    }

    private function domainPath(){
        $path = $this->file->projectRootPath() . '\\' . $this->file->name();
        $from = '/'.preg_quote('public\\', '/').'/';
        $path = preg_replace($from, '', $path, 1);
        return str_replace('\\','/', $path);
    }
}