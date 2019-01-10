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
    private $primary;

    private $limit;
    private $file;

    public function main(): ?string
    {
        return $this->primary;
    }

    public function __construct(File $file , int $limit = 0)
    {
        $this->limit = $limit;
        $this->file = $file;
    }

    public function upload()
    {

    }
}