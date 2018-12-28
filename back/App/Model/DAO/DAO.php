<?php

namespace Model\DAO;

use PDO;

abstract class DAO
{
    protected static $table;
    protected static $class;

    private static function getClassName(){
        return "Model\\Items\\" . static::$class;
    }

    public static function getAll()
    {
        $statement = DB::conn()->prepare("SELECT * FROM " . static::$table);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, self::getClassName());
    }

    public static function getById($id)
    {
        $statement = DB::conn()->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, self::getClassName())[0];
    }

    public static function getBy($column, $value)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE " . $column . "= :value";
        $statement = DB::conn()->prepare($sql);
        $statement->bindValue(":value", $value);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, self::getClassName());
    }

    public static function deleteById($id)
    {
        $statement = DB::conn()->prepare("DELETE FROM " . static::$table . " WHERE id=:id");
        $statement->bindValue(":id", $id);
        $statement->execute();
    }

    public static function deleteBy($column, $value)
    {
        $statement = DB::conn()->query("DELETE FROM " . static::$table . " WHERE :column=':value'");
        $statement->bindValue(":column", $column, PDO::PARAM_STR);
        $statement->bindValue(":value", $value);
        $statement->execute();
    }

}