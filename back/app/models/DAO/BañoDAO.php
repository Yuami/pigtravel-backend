<?php

class BañoDAO extends DAO{

    public function getById($id) {
        return parent::getById("baño", $id);
    }
    public function getAllBaños(){
        return parent::getAll("baño");
    }
}