<?php

    class PlayerManager extends DBManager {

        public function getAllPlayers() {
            $prepare = $this->getConnection()->query("SELECT * FROM `Player`");
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

        public function createPlayer(string $first_name, string $second_name, string $city, int $team_id, int $game_id) {
            $prepare = $this->getConnection()->prepare("INSERT INTO `Player` (first_name, second_name, city, team_id, game_id)
            VALUES
            (:first_name, :second_name, :city, :team_id, :game_id);");
            $prepare->bindValue(":first_name", $first_name);
            $prepare->bindValue(":second_name", $second_name);
            $prepare->bindValue(":city", $city);
            $prepare->bindValue(":team_id", $team_id);
            $prepare->bindValue(":game_id", $game_id);

            $prepare->execute();
        }
    }
  
?>