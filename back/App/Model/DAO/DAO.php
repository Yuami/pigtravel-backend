<?php

namespace Model\DAO;

use PDO;

abstract class DAO
{
    protected static $table;
    protected static $class;

    protected static function getClassName()
    {
        return "Model\\Items\\" . static::$class;
    }

    protected static function fetchAll(\PDOStatement $statement)
    {
        return $statement->fetchAll(PDO::FETCH_CLASS, self::getClassName());
    }

    protected static function fetchOne(\PDOStatement $statement)
    {
        return self::fetchAll($statement)[0];
    }

    public static function getAll()
    {
        $statement = DB::conn()->prepare("SELECT * FROM " . static::$table);
        $statement->execute();

        return self::fetchAll($statement);
    }

    public static function getById($id)
    {
        $statement = DB::conn()->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        return self::fetchOne($statement);
    }

    public static function getBy($column, $value, $order = false, $orderCol = "", $orderType = "asc")
    {
        if (!$order) {
            $sql = "SELECT * FROM " . static::$table . " WHERE " . $column . "= :value";
        } else {
            if ($orderCol != "")
                $sql = "SELECT * FROM " . static::$table . " WHERE " . $column . "= :value order by $orderCol $orderType";
            else
                $sql = "SELECT * FROM " . static::$table . " WHERE " . $column . "= :value";
        }
        $statement = DB::conn()->prepare($sql);
        $statement->bindValue(":value", $value);
        $statement->execute();

        return self::fetchAll($statement);
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