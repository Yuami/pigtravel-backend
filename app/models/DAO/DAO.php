<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 16/11/2018
 * Time: 12:20
 */

abstract class DAO extends PDO {
    private static $instance = null;


    public function __construct() {
        $config = Config::singleton();
        $dsn = 'mysql:host=' . $config->get('dbhost') . ';dbname=' . $config->get('dbname');
        $user = $config->get('dbuser');
        $pass = $config->get('dbpass');
        parent::__construct($dsn, $user, $pass);
    }

    public function getAll($table) {
        $statement = parent::prepare("SELECT * FROM :table");
        $statement->bindValue(":table", $table);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($table, $id) {
        $statement = parent::prepare("SELECT * FROM :table WHERE id=:id");
        $statement->bindValue(":id", $id);
        $statement->bindValue(":table", $table);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getBy($table, $column, $value) {
        $statement = parent::prepare("SELECT * FROM :table WHERE :column=':value'");
        $statement->bindValue(":column", $column);
        $statement->bindValue(":value", $value);
        $statement->bindValue(":table", $table);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function deleteById($table, $id) {
        $statement = parent::prepare("DELETE FROM :table WHERE id=:id");
        $statement->bindValue(":table", $table);
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function deleteBy($table, $column, $value) {
        $statement = parent::query("DELETE FROM :table WHERE :column=':value'");
        $statement->bindValue(":table", $table);
        $statement->bindValue(":column", $column);
        $statement->bindValue(":value", $value);
        $statement->execute();
        return $statement->fetchAll();
    }


}