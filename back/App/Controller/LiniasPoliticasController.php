<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 29/01/2019
 * Time: 13:01
 */

namespace Controller;


use Model\DAO\LiniaPoliticaCancelacionDAO;
use Routing\Router;

class LiniasPoliticasController extends Controller
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
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
        die(var_dump("llega"));
        $liniaP = LiniaPoliticaCancelacionDAO::getById($id);
        $politica = $liniaP->getId();
        Router::redirect('/politicas' . $politica->getId());
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}