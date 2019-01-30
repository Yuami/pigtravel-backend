<?php
/**
 * Created by PhpStorm.
 * User: magobeodo
 * Date: 26/11/18
 * Time: 8:49
 */

namespace Model\DAO;
class LiniaPoliticaCancelacionDAO extends DAO
{
    protected static $table = "linia_politica_cancelacion";
    protected static $class = "LiniaPoliticaCancelacion";

    public static function getByIdPolitica($id)
    {
        return parent::getBy('idPoliticaCancelacion', $id);
    }
}