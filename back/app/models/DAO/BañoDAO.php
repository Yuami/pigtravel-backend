<?php

class BañoDAO extends DAO
{
<<<<<<< HEAD

    public function getById($id)
    {
        return parent::getById("baño", $id);
    }

    public static function getAll()
    {
        return parent::getAll("baño");
    }

    public function deleteById($id)
    {
        return parent::deleteById("baño", $id);
    }

    public function getByServicioBaño($idServicioBaño)
    {
        return parent::getBy("baño", idServicioBaño, $idServicioBaño);
    }

    public function deleteByServicioBaño($idServicioBaño)
    {
        return parent::deleteBy("baño", idServicioBaño, $idServicioBaño);

    }
=======
    protected static $table = "baño";
    protected static $class = "Baño";
>>>>>>> 17be6b4db9dc206c6c8b0b2a317491a2340b76f4
}
