<?php
/**
 * Created by PhpStorm.
 * User: JFornes
 * Date: 09/01/2019
 * Time: 21:26
 */

namespace Config\Photos;


class PerfilPhoto extends Photos
{
    public static function find(string $id)
    {
        return new self('perfiles/' . $id . '/');
    }

    protected function __construct($dir, $limit = 1)
    {
        parent::__construct($dir, $limit);
    }
}