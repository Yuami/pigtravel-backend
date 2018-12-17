<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 17/12/2018
 * Time: 8:17
 */

abstract class Controller {
    public abstract function index();

    public abstract function create();

    public abstract function store();

    public  abstract function show();

    public abstract function edit();

    public  abstract function update();

    public abstract function destroy();

}