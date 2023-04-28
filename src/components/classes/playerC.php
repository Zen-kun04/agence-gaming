<?php
    class Player {
        
        private $id;
        private $first_name;
        private $second_name;
        private $city;
        private $team_id;
        private $game_id;


        public function getID() {
            return $this->id;
        }

        public function setID(int $id) {
            $this->id = $id;
        }

        public function getFirstName() {
            return $this->first_name;
        }

        public function setFirstName(string $first_name) {
            $this->first_name = $first_name;
        }

        public function getSecondName() {
            return $this->second_name;
        }

        public function setSecondName(string $second_name) {
            $this->second_name = $second_name;
        }

        public function getCity() {
            return $this->city;
        }

        public function setCity(string $city) {
            $this->city = $city;
        }

        public function getTeamID() {
            return $this->team_id;
        }

        public function setTeamID(string $team_id) {
            $this->team_id = $team_id;
        }

        public function getGameID() {
            return $this->game_id;
        }

        public function setGameID(string $game_id) {
            $this->game_id = $game_id;
        }
    }
?>