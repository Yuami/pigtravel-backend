<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 21/11/2018
 * Time: 9:19
 */
namespace Model\Items;

class ServicioBaño {
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

}