<?php
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
    }
?>