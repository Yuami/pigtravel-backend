<?php

class Baño
{
    private $id;
    private $tipoBaño;
    private $serveis = array();

    public function __construct($id, $tipoBaño,$serveis)
    {
        $this->id = $id;
        $this->tipoBaño = $tipoBaño;
        $this->serveis=getServicioBaño(id);
    }

    public function getTipoBaño()
    {
        return $this->tipoBaño;
    }

    public function setTipoBaño($tipoBaño): void
    {
        $this->tipoBaño = $tipoBaño;
    }
    public function getServicioBaño($idBaño){

        $statement = mysqli_query("SELECT 	idServicioBano FROM baño where id='idBaño'");
        $servicio = array();
        while($row = mysqli_fetch_assoc($statement))
        {
            if (is_null($row)){
                $servicio[] = null;
            }
        else
            $servicio[] = $row;
        }
        return $servicio->fetchAll(PDO::FETCH_ASSOC);
    }


}
