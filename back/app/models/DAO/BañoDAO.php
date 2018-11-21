<?php

class BañoDAO extends DAO
{

    public function getById($id)
    {
        return parent::getById("baño", $id);
    }

    public function getAll()
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

    public function deleteByServicioBaño($idServicio)
    {
        return parent::deleteBy("baño", idServicioBaño, $idServicioBaño);

    }
}
