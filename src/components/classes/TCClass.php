<?php 

class TeamCompetition {
        
    private $id;
    private $team_id;
    private $team_name;
    private $compet_id;
    private $compet_name;


    public function get_iD() {
        return $this->id;
    }

    public function set_iD(int $id) {
        $this->id = $id;
    }

    public function get_team_iD() {
        return $this->team_id;
    }

    public function set_team_iD(string $team_id) {
        $this->team_id = $team_id;
    }

    public function get_team_name() {
        return $this->team_name;
    }

    public function set_team_name(string $team_name) {
        $this->team_name = $team_name;
    }

    public function get_compet_iD() {
        return $this->compet_id;
    }

    public function set_compet_iD(string $compet_id) {
        $this->compet_id = $compet_id;
    }

    public function get_compet_name() {
        return $this->compet_name;
    }

    public function set_compet_name(string $compet_name) {
        $this->compet_name = $compet_name;
    }
}




?>