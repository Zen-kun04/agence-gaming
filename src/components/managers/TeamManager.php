<?php
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

    public function createTeam(string $name, string $description)
    {
        $prepare = $this->getConnection()->prepare("INSERT INTO `Team` (name, description) VALUES (:name, :description); ");
        $prepare->bindValue(":name", $name);
        $prepare->bindValue(":description", $description);
        $prepare->execute();
    }
}
?>