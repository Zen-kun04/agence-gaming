<?php

    class PlayerManager extends DBManager {

        public function getAllPlayers() {
            $prepare = $this->getConnection()->query("SELECT * FROM `players`");
            $players = [];
            foreach($prepare as $playerData) {
                $player = new Player();
                $player->setID($playerData["id"]);
                $player->setFirstName($playerData["first_name"]);
                $player->setSecondName($playerData["second_name"]);
                $player->setCity($playerData["city"]);
                $player->setTeamID($playerData["team_id"]);
                $player->setGameID($playerData["game_id"]);

                $players[] = $player;
            }
            return $players;
        }
    }
  
?>