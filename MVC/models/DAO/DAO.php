<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 16/11/2018
 * Time: 12:20
 */

abstract class DAO extends PDO {
    private $table;
    private $db;

    private static $instance = null;


    private function __construct($table) {
        $this->table=(string) $table;

        $config = Config::singleton();
        $dsn = 'mysql:host=' . $config->get('dbhost') . ';dbname=' . $config->get('dbname');
        $user = $config->get('dbuser');
        $pass = $config->get('dbpass');
        parent::__construct($dsn, $user, $pass);
    }

    public function db(){
        return $this->db;
    }

    public function getAll(){
        $statement = "SELECT * FROM $this->table ORDER BY id DESC";
        $res = db()->prepare($statement);
        $res->execute();

        //Devolvemos el resultset en forma de array de objetos
        $rows = $res->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function getById($id){
        $query=$this->db->query("SELECT * FROM $this->table WHERE id=$id");

        if($row = $query->fetch_object()) {
            $resultSet=$row;
        }

        return $resultSet;
    }

    public function getBy($column,$value){
        $query=$this->db->query("SELECT * FROM $this->table WHERE $column='$value'");

        while($row = $query->fetch_object()) {
            $resultSet[]=$row;
        }

        return $resultSet;
    }

    public function deleteById($id){
        $query=$this->db->query("DELETE FROM $this->table WHERE id=$id");
        return $query;
    }

    public function deleteBy($column,$value){
        $query=$this->db->query("DELETE FROM $this->table WHERE $column='$value'");
        return $query;
    }


}