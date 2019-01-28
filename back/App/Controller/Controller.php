<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 17/12/2018
 * Time: 8:17
 */
namespace Controller;

abstract class Controller {
    public abstract function index();

    public abstract function create();

    public  abstract function show($id);

    public abstract function edit($id);

    public  abstract function update($id);

    public abstract function destroy();

}