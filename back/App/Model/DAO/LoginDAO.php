<?php
namespace Model\DAO;

class LoginDAO {

    public static function credentials($correo) {
        $persona = PersonaDAO::getByCorreo($correo);
        if ($persona != null)
            return ["correo" => $persona->getCorreo(), "password" => $persona->getPassword()];
        return null;
    }

}