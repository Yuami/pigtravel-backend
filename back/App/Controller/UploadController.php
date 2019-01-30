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
use Model\DAO\ViviendaDAO;
use Model\DAO\ViviendaHasFotosDAO;
use Model\Items\Foto;
use Model\Items\ViviendaHasFotos;

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
        if (Session::me() == $idPersona) {
            if (isset($_FILES['picture']) && isset($idPersona)) {
                $uploaded = File::uploadPhoto('picture', 'assets/uploads/img/perfiles');
                if (isset($uploaded)) {
                    $photo = $uploaded;
                    if ($photo instanceof Foto)
                        PersonaDAO::update([
                            'idFoto' => $photo->getId()
                        ], "id = $idPersona");
                }
            }
        }
    }

    public function house($idVivienda)
    {
        if (HouseController::validUser($idVivienda)) {
            if (isset(File::get()['picture']) && isset($idVivienda)) {

                $uploads = File::uploadAllPhotos('picture', 'assets/uploads/img/casas');
                $vivienda = ViviendaHasFotosDAO::getLastByVivienda($idVivienda);
                for ($i = 0; $i < sizeof($uploads); $i++) {
                    $upload = $uploads[$i];
                    if ($upload instanceof Foto) {
                        $index = $i + 1;
                        $posicion = $vivienda instanceof ViviendaHasFotos ? $index + $vivienda->getPosicion() : $index;

                        ViviendaHasFotosDAO::insert([
                            'idVivienda' => $idVivienda,
                            'idFoto' => $upload->getId(),
                            'posicion' => $posicion
                        ]);
                    }
                }
            }
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