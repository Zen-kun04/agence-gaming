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

    public function createTeam(string $name, string $description){
        $prepare = $this->getConnection()->prepare("INSERT INTO `Team` (name, description) VALUES (:name, :description); ");
        $prepare->bindValue(":name", $name);
        $prepare->bindValue(":description", $description);
        $prepare->execute();
    }
}
?>