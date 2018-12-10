<?php

class File {

    public static function exists($nombre, $ruta = ""){
        if (file_exists($ruta . $nombre)) {
            return true;
        }
        return false;
    }


    public static function getProfileImage($id) : string {
        $imageType = array('.png', '.jpg', '.jpeg');

        foreach ($imageType as $type) {
            if (self::exists($id . $imageType[$type], PERFIL)) {
                return PERFIL . $id . $imageType[$type];
            }
        }
        return "https://api.adorable.io/avatars/285/" . $id . ".png";
    }
}