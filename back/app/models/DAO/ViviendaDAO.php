<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 21/11/2018
 * Time: 8:38
 */
namespace model;
class ViviendaDAO {
    private static $table = "Vivienda";

    public static function getAll() {
        return DAO::getAll(self::$table);
    }

    public static function getById($id) {
        return DAO::getById(self::$table, $id);
    }

    public function getBy($column, $value) {
        return DAO::getBy(self::$table, $column, $value);
    }

    public function deleteById($id) {
        return DAO::deleteById(self::$table, $id);
    }

    public function deleteBy($column, $value) {
        return DAO::deleteBy(self::$table, $column, $value);
    }

}