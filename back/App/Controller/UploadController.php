<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 17/12/2018
 * Time: 8:34
 */

namespace Controller;

use Config\File;
use Config\Session;
use Model\DAO\PersonaDAO;
use Model\Items\Foto;

class UploadController extends Controller
{
    public static function uploadAll($images)
    {

    }

    public function index()
    {
    }

    public function create()
    {

    }

    public function profile($idPersona)
    {
        if (Session::me() == $idPersona)
            if (isset(File::get()['picture']) && isset($idPersona)) {
                $uploaded = File::uploadPhoto('picture', 'assets/uploads/img/perfiles');
                if (isset($uploaded[0])) {
                    $photo = $uploaded[0];
                    if ($photo instanceof Foto)
                        PersonaDAO::update([
                            'idFoto' => $photo->getId()
                        ], "id = $idPersona");
                }
            }
    }

    public function house($idVivienda)
    {
        if (isset(File::get()['picture']) && isset($idVivienda)){
            $uploads = File::uploadAllPhotos('picture', 'assets/uploads/img/casas');
            print_r($uploads);
        }
    }

    public function store()
    {
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }

}