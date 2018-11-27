<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 16/11/2018
 * Time: 12:20
 */
include "DB.php";

abstract class DAO {
    protected static $table;
    protected static $class;

    public static function getAll() {
        $statement = DB::conn()->prepare("SELECT * FROM " . static::$table);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, static::$class);
    }

    public static function getById($id) {
        $statement = DB::conn()->prepare("SELECT * FROM " . static::$table . " WHERE id=:id");
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, static::$class);
    }

    public static function getBy($column, $value) {
        $statement = DB::conn()->prepare("SELECT * FROM " . static::$table . " WHERE :column = :value ");
        $statement->bindValue(":column", $column, PDO::PARAM_STR);
        $statement->bindValue(":value", $value, PDO::PARAM_STR);
        $statement->bindValue(":table", static::$table,PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, static::$class);
    }

    public static function deleteById($id) {
        $statement = DB::conn()->prepare("DELETE FROM " . static::$table . " WHERE id=:id");
        $statement->bindValue(":table", static::$table);
        $statement->bindValue(":id", $id);
        $statement->execute();
    }

    public static function deleteBy($column, $value) {
        $statement = DB::conn()->query("DELETE FROM " . static::$table . " WHERE :column=':value'");
        $statement->bindValue(":table", static::$table);
        $statement->bindValue(":column", $column);
        $statement->bindValue(":value", $value);
        $statement->execute();
    }

    public abstract static function insert();

}