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

class CiudadesController extends Controller
{
    public function index()
    {
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
        header("Content-Type: application/json; charset=UTF-8");
        $statement = "select p.name, p.region_id, p.country_id, p.id from cities p where `region_id` = $id GROUP by p.name";
        $res = DB::conn()->prepare($statement);
        $res->execute();
        $rows = $res->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows);
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