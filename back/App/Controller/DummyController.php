<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 17/12/2018
 * Time: 8:34
 */
namespace Controller;

class DummyController extends Controller {
    public function index() {
        echo "I'm dummy index";
    }

    public function create() {
        echo "I'm dummy create";
    }

    public function store() {
        echo "I'm dummy store";
    }

    public function show($id) {
        echo "I'm dummy $id show";
    }

    public function edit($id) {
        echo "I'm dummy $id edit";
    }

    public function update($id) {
        echo "I'm dummy $id update";
    }

    public function destroy() {
        echo "I'm dummy destroy";
    }

}