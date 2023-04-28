<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
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

        public function deletePlayerById(int $id) {
            $prepare = $this->getConnection()->prepare("DELETE FROM `Player` WHERE id = ?");
            $prepare->execute([
                $id
            ]);
        }

        public function playerExist(int $id) {
            $data = $prepare = $this->getConnection()->prepare("SELECT * FROM `Player` WHERE id = ?");
            $prepare->execute([
                $id
            ]);

            return !empty($data->fetch());
        }

        public function getPlayerByID(int $id) {
            $data = $prepare = $this->getConnection()->prepare("SELECT * FROM Player WHERE id = ?;");
            $prepare->execute([
                $id
            ]);
            foreach ($data as $key => $value) {
                $player = new Player();
                $player->setId($value["id"]);
                $player->setFirstName($value["first_name"]);
                $player->setSecondName($value["second_name"]);
                $player->setCity($value["city"]);
                $player->setTeamID($value["team_id"]);
                $player->setGameID($value["game_id"]);
                return $player;
            }
            return null;
        }

        public function updatePlayer(Player $player) {
            $prepare = $this->getConnection()->prepare("UPDATE Player SET first_name = ?, second_name = ?, city = ?, team_id = ?, game_id = ? WHERE id = ?");
            $prepare->execute([
                $player->getFirstName(),
                $player->getSecondName(),
                $player->getCity(),
                $player->getTeamID(),
                $player->getGameID(),
                $player->getID()
            ]);
        }

        public function createPlayer(string $first_name, string $second_name, string $city, int $team_id, int $game_id) {
            // echo("Team: " . $team_id);
            // echo("Game: " . $game_id);
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