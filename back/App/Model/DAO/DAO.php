<?php

namespace Model\DAO;

use PDO;

abstract class DAO {
    protected static $table;
    protected static $class;

    protected static function getClassName() {
        return "Model\\Items\\" . static::$class;
    }

    protected static function fetchAll(\PDOStatement $statement) : ?array {
        $res = $statement->fetchAll(PDO::FETCH_CLASS, self::getClassName());
        return $statement->rowCount() > 0 ? $res : null;
    }

    protected static function fetchOne(\PDOStatement $statement) {
        $statement->setFetchMode(PDO::FETCH_CLASS, self::getClassName());
        return $statement->rowCount() > 0 ? $statement->fetch() : null;
    }

    public static function getAll() {
        return self::getAllOrdered();
    }

    public static function getAllOrdered($orderCol = "", $orderType = "asc") {
        $sql = "SELECT * FROM " . static::$table;
        if ($orderCol != "") {
            $sql .= " order by $orderCol $orderType";
        }
        $statement = DB::conn()->prepare($sql);
        $statement->execute();

        return self::fetchAll($statement);
    }

    public static function getById($id) {
        $statement = DB::conn()->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        return self::fetchOne($statement);
    }

    public static function getBy($column, $value, $order = false, $orderCol = "", $orderType = "asc") {
        $sql = "SELECT * FROM " . static::$table . " WHERE " . $column . "= :value";
        if ($order && $orderCol != "") {
            $sql .= " order by $orderCol $orderType";
        }
        $statement = DB::conn()->prepare($sql);
        $statement->bindValue(":value", $value);
        $statement->execute();

        return self::fetchAll($statement);
    }

    public static function deleteById($id) {
        $statement = DB::conn()->prepare("DELETE FROM " . static::$table . " WHERE id=:id");
        $statement->bindValue(":id", $id);
        $statement->execute();
    }

    public static function deleteBy($column, $value) {
        $statement = DB::conn()->query("DELETE FROM " . static::$table . " WHERE :column=':value'");
        $statement->bindValue(":column", $column, PDO::PARAM_STR);
        $statement->bindValue(":value", $value);
        $statement->execute();
    }

    public static function insert(array $parameters) {
        $table = static::$table;
        $keys = array_keys($parameters);
        $columns = implode(', ', $keys);
        $values = ':' . implode(', :', $keys);

        $sql = sprintf('insert into %s (%s) values (%s)',
            $table, $columns, $values);

        try {
            $con = DB::conn();
            $statement = $con->prepare($sql);
            $statement->execute($parameters);
            $id = $con->lastInsertId();
            return static::getById($id);
        } catch (\Exception $e) {
            return null;
        }
    }
}