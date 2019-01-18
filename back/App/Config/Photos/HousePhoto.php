<?php
/**
 * Created by PhpStorm.
 * User: JFornes
 * Date: 09/01/2019
 * Time: 20:11
 */

namespace Config\Photos;


class HousePhoto extends Photos
{
    protected $defaultMain = '/assets/uploads/img/casas/default-image.jpg';
    protected $noMain = false;
    protected $fileNameClient = 'housePhotos';

    public static function find(string $id)
    {
        return new self('casas/' . $id . '/', $id);
    }

    protected function __construct($dir, $limit = 15)
    {
        parent::__construct($dir, $limit);
    }
}