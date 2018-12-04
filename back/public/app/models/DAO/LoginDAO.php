<?php
require_once MODEL . "Items/Persona.php";
require_once MODEL . "DAO/PersonaDAO.php";

class LoginDAO {

    public static function credentials($id) {
        $persona = PersonaDAO::getBy("correo", $id);
        return ["correo"=>$persona->getCorreo(), "password"=>$persona->getPassword()];
    }

}