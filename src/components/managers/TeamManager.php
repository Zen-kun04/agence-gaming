<?php
    class TeamManager extends DBManager {
        public function getAllTeam() {
            $prepare = $this->getConnection()->query("SELECT * FROM `Team`");
            $teams = [];
            foreach ($prepare as $teamData) {
                $team = new Game();
                $team->setID($teamData["id"]);
                $team->setName($teamData["name"]);
                $team->setStation($teamData["station"]);
                $team->setFormat($teamData["format"]);

                $teams[] = $team;
            }
            return $teams;
        }
    }
?>