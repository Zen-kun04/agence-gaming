<?php

class Sponsor
{

    private $id;
    private $brand;

    // FOREIGN KEY
    private $team_id;


    public function getId()
    {
        return $this->id;
    }
    public function setId(int $argumentId)
    {
        $this->id = $argumentId;
    }


    public function getBrand()
    {
        return $this->brand;
    }
    public function setBrand(string $argumentBrand)
    {
        $this->brand = $argumentBrand;
    }


    // FOREIGN KEY
    public function get_team_id()
    {
        return $this->team_id;
    }
    public function set_team_id(?int $argument_team_id)
    {
        $this->team_id = $argument_team_id;
    }

}

?>