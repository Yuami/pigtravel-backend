<?php
require_once MODEL . "Items/Persona.php";
require_once MODEL . "DAO/PersonaDAO.php";

class LoginDAO {

    public static function credentials($correo) {
        $persona = PersonaDAO::getByCorreo($correo);
        if ($persona != null)
            return ["correo" => $persona[0]->getCorreo(), "password" => $persona[0]->getPassword()];
        return null;
    }

}