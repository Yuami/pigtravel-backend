<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 11/01/2019
 * Time: 19:59
 */

namespace Controller\Api;


use Controller\Controller;
use Model\DAO\DB;
use PDO;

class PaisesController extends Controller
{
    public function index()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $statement = "select p.name, p.id from countries p group by p.name";
        $res = DB::conn()->prepare($statement);
        $res->execute();
        $rows = $res->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows);
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store()
    {
        // TODO: Implement store() method.
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