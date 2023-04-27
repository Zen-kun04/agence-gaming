<?php

include('./navbar.php');
include('./managers/DBManager.php');
include('./managers/TeamManager.php');
$manager = new TeamManager();

class Team
{
    private $id;
    private $name;
    private $description;


    public function getId()
    {
        return $this->id;
    }
    public function setId(int $argumentId)
    {
        $this->id = $argumentId;
    }


    public function getName()
    {
        return $this->name;
    }
    public function setName(string $argumentName)
    {
        $this->name = $argumentName;
    }


    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription(string $argumentDescription)
    {
        $this->description = $argumentDescription;
    }

}
;




if (!empty($_POST["name"]) && !empty($_POST["description"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];

    $manager->createTeam($name, $description);
}



?>
<link rel="stylesheet" href="../table.css">
<table>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
    </tr>

    <?php
    $team = new Team();
    $statement = $manager->getAllTeams();
    foreach ($statement as $key => $value) {
        echo ('<tr>');
        echo ('<th>' . $value->getID() . '</th>');
        echo ('<td>' . $value->getName() . '</td>');
        echo ('<td>' . $value->getDescription() . '</td>');
        echo ('<tr>');
    }
    ?>

</table>

<form action="/components/team.php" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">

    <label for="description">Description</label>
    <input type="text" name="description" id="description">

    <input type="submit" value="Confirmer">
</form>