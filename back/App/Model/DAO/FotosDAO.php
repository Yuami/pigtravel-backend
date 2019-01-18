<?php
/**
 * Created by PhpStorm.
 * User: JFornes
 * Date: 16/01/2019
 * Time: 11:38
 */

namespace Model\DAO;


class FotosDAO extends DAO
{
    protected $table = 'fotos';
    protected $class = 'Fotos';

    public function getByIdVivienda($id)
    {
        return self::getBy('idVivienda', $id, true, 'posicion');
    }

    public function getMainVivienda($id)
    {
        return self::getByIdVivienda($id)[0];
    }
}