<?php

class Ciudad
{
    private $id;
    private $cp;
    public function __construct($id, $cp)
    {
        $this->id = $id;
        $this->cp = $cp;
    }
    public function getCP()
    {
        return $this->cp;
    }
    public function setCp($cp): void
    {
        $this->cp= $cp;
    }
}


