<?php
include_once(__DIR__ . "/../classes/teamC.php");
include_once(__DIR__ . "/DBManager.php");
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

    public function getTeamByID(int $id) {
        $data = $prepare = $this->getConnection()->prepare("SELECT * FROM Team WHERE id = ?");
        $prepare->execute([
            $id
        ]);
        return $data;
    }

    public function createTeam(string $name, string $description){
        $prepare = $this->getConnection()->prepare("INSERT INTO `Team` (name, description) VALUES (:name, :description); ");
        $prepare->bindValue(":name", $name);
        $prepare->bindValue(":description", $description);
        $prepare->execute();
    }
}
?>