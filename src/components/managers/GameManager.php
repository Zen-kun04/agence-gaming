<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
    class GameManager extends DBManager {
        public function getAllGames() {
            $prepare = $this->getConnection()->query("SELECT * FROM `Game`");
            $games = [];
            foreach ($prepare as $gameData) {
                $game = new Game();
                $game->setID($gameData["id"]);
                $game->setName($gameData["name"]);
                $game->setStation($gameData["station"]);
                $game->setFormat($gameData["format"]);

                $games[] = $game;
            }
            return $games;
        }

        public function getGameByID(int $id) {
            
            $data = $prepare = $this->getConnection()->prepare("SELECT * FROM Game WHERE id = ?;");
            $prepare->execute([
                $id
            ]);

            foreach ($data as $key => $value) {
                $game = new Game();
                $game->setID($value["id"]);
                $game->setName($value["name"]);
                $game->setStation($value["station"]);
                $game->setFormat($value["format"]);
                return $game;
            }
            return null;
        }

        public function updateGame(Game $game){
            $prepare = $this->getConnection()->prepare("UPDATE Game SET name = ?, station = ?, format = ? WHERE id = ?");
            $prepare->execute([
                $game->getName(),
                $game->getStation(),
                $game->getFormat(),
                $game->getID()
            ]);
        }

        public function getAllStations(){
            $prepare = $this->getConnection()->query("SELECT DISTINCT station FROM `Game`");
            $stations = [];
            foreach ($prepare as $key => $value) {
                $stations[] = $value;
            }
            return $stations;
        }

        public function getAllFormats(){
            $prepare = $this->getConnection()->query("SELECT DISTINCT format FROM `Game`");
            $formats = [];
            foreach ($prepare as $key => $value) {
                $formats[] = $value;
            }
            return $formats;
        }

        public function deleteGameById(int $id) {
            $prepare = $this->getConnection()->prepare("DELETE FROM `Game` WHERE id = ?");
            $prepare->execute([
                $id
            ]);
            header("Location:" . $_SERVER["PHP_SELF"]);
            exit();
        }

        public function createGame(string $name, string $station, string $format) {
            $prepare = $this->getConnection()->prepare("INSERT INTO `Game` (name, station, format) VALUES
            (:name, :station, :format);");
            $prepare->bindValue(":name", $name);
            $prepare->bindValue(":station", $station);
            $prepare->bindValue(":format", $format);
            $prepare->execute();
        }
    }
?>