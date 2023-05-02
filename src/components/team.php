<?php

require_once('./navbar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
$login_manager = new LoginManager();
if (!$login_manager->checkAuthenticatedRequest()) {
    header("Location:/components/login.php");
    exit();
}
$manager = new TeamManager();






if (!empty($_POST["name"]) && !empty($_POST["description"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];

    $manager->createTeam($name, $description);

} else if (!empty($_GET["delete"])) {
    $id = $_GET["delete"];
    $manager->deleteTeamById($id);
}

?>
<link rel="stylesheet" href="../style.css">

<main>
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Supprimer</th>
            <th>Editer</th>
        </tr>

        <?php
        $team = new Team();
        $statement = $manager->getAllTeams();
        foreach ($statement as $key => $value) {
            echo ('<tr>');
            echo ('<th>' . $value->getID() . '</th>');
            echo ('<td>' . $value->getName() . '</td>');
            echo ('<td>' . $value->getDescription() . '</td>');
            echo ("<td>" . "<a href='/components/team.php?delete=" . $value->getID() . "'>Delete</a>" . "</td>");
            echo("<td>" . "<a href='/components/edit.php?team=" . $value->getID() . "'>Edit</a>" . "</td>");
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


    <!-- ANIMATE CSS BACKGROUND -->
    <?php require_once("../background.php"); ?>

</main>