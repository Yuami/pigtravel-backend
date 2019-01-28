<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 17/12/2018
 * Time: 8:34
 */

namespace Controller;

use libs\Bulletproof\Image;

class UploadController extends Controller
{
    public function index()
    {
        $image = new Image($_FILES);
        if ($image["pictures"]) {
            $upload = $image->upload();

            if ($upload) {
                echo $upload->getFullPath();
                echo $upload->getLocation();
            } else {
                echo $image->getError();
            }
        }
    }

    public function create()
    {

    }

    public function store()
    {
        if(isset($_FILES['uploaded_file']))
        {
            echo "listen"; te lo subo
            $path = "/assets/uploads/img/casas";
            $path = $path . basename( $_FILES['uploaded_file']['name']);
            if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
                echo "The file ".  basename( $_FILES['uploaded_file']['name']).
                    " has been uploaded";
            } else{
                echo "There was an error uploading the file, please try again!";
            }
        } else {
            echo "qqqq";
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