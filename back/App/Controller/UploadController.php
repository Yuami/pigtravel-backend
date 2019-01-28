<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 17/12/2018
 * Time: 8:34
 */

namespace Controller;

use libs\Bulletproof\Image;
use Model\DAO\FotoDAO;

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

    public function store()
    {
        if (isset($_FILES['picture'])) {
            $image = new \Bulletproof\Image($_FILES);
            $path = '/assets/uploads/img';
            $image->setLocation(ROOT . $path, 777);
            if ($image["picture"]) {
                $upload = $image->upload();

                if ($upload) {
                    FotoDAO::insert([
                        'path' => $path . '/' . $upload->getName()
                    ]);
                } else {
                    echo $image->getError();
                }
            }
        }
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