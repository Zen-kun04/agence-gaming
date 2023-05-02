<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
    class TeamManager extends DBManager
    {
        public function getAllTeams()
        {
            $prepare = $this->getConnection()->query("SELECT * FROM `Team`");
            $teams = [];
            foreach ($prepare as $teamData) {
                $team = new Team();
                $team->setID($teamData["id"]);
                $team->setName($teamData["name"]);
                $team->setDescription($teamData["description"]);

                $teams[] = $team;
            }
            return $teams;
        }

        public function deleteTeamById(int $id)
        {
            $data = $prepare = $this->getConnection()->prepare("DELETE FROM Team WHERE id = ?");
            $prepare->execute([$id]);
            // header("location:" . $_SERVER["PHP_SELF"]);

            // exit();
            return !empty($data->fetch());
        }

        public function teamExist (int $id) {
            $data = $prepare = $this->getConnection()->prepare("SELECT * FROM `Team` Where id = ?");
            $prepare->execute([$id]);
    
            return !empty($data->fetch());
            }

        public function getTeamByID(int $id) {
            $data = $prepare = $this->getConnection()->prepare("SELECT * FROM Team WHERE id = ?;");
            $prepare->execute([
                $id
            ]);
            foreach ($data as $key => $value) {
                $team = new Team();
                $team->setId($value["id"]);
                $team->setName($value["name"]);
                $team->setDescription($value["description"]);
                return $team;
            }
            return null;
        }

        public function updateTeam (Team $team) {
            $prepare = $this->getConnection()->prepare("UPDATE Team SET `name` = ?, `description` = ? WHERE id = ?");
            $prepare->execute([
                $team->getName(),
                $team->getDescription(),
                $team->getId()
            ]);
        }

        public function createTeam(string $name, string $description){
            $prepare = $this->getConnection()->prepare("INSERT INTO `Team` (name, description) VALUES (:name, :description); ");
            $prepare->bindValue(":name", $name);
            $prepare->bindValue(":description", $description);
            $prepare->execute();
        }
    }
?>