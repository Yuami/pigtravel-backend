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
    public static function find(string $id)
    {
        return new self('casas/' . $id . '/');
    }

    protected function __construct($dir, $limit = 15)
    {
        parent::__construct($dir, $limit);
    }


}