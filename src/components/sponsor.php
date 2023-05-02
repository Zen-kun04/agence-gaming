<?php

require_once('./navbar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
$login_manager = new LoginManager();
    if(!$login_manager->checkAuthenticatedRequest()){
        header("Location:/components/login.php");
        exit();
    }

$manager = new SponsorManager();


if (!empty($_POST["brand"]) && !empty($_POST["team"])) {
    $sponsor = $_POST["brand"];
    $team_id = $_POST["team"];
    $manager->createSponsor($sponsor, intval($team_id));
    // Ça me rend ouf de code à la noix !!!
    // Putain de : PHP ==> Putain de : Palindrome pour Handicapé Prépubère
    // J'aime pas du tout le ton que tu prends avec moi PHP ! J'vais devoir te débrancher !
    // L'euthanasie digitale tu connais ? Attends, j'te montre !

} else if (!empty($_GET["delete"])) {
    $id = $_GET["delete"];
    $manager->deleteSponsorById($id);
}
?>

<link rel="stylesheet" href="../style.css">
<main>
    <table>
        <tr>
            <th>#</th>
            <th>Marque</th>
            <th>Team_#</th>
            <th>Supprimer</th>
            <th>Editer</th>
        </tr>

        <?php

        $sponsor = new Sponsor();
        $statement = $manager->getAllSponsors();
        $team_manager = new TeamManager();
        foreach ($statement as $key => $value) {
            echo ("<tr>");
            echo ("<th>" . $value->getID() . "</th>");
            echo ("<td>" . $value->getBrand() . "</td>");
            if($value->get_team_id()!== null) {
                echo ("<td>" . $team_manager->getTeamByID($value->get_team_id())->getName() . "</td>");
            }else {
                echo ("<td>No Team</td>");
            }
            echo ("<td>" . "<a href='/components/sponsor.php?delete=" . $value->getID() . "'>Delete</a>" . "</td>");
            echo("<td>" . "<a href='/components/edit.php?sponsor=" . $value->getID() . "'>Edit</a>" . "</td>");
            echo ("</tr>");
        }
        ?>
    </table>

    <form action="/components/sponsor.php" method="post">
        <label for="brand">Marque</label>
        <input type="text" name="brand" id="brand"> 

        <label for="team">Team</label>
            <select name="team" id="team">
                <?php
                    $team_manager = new TeamManager();
                    $teams = $team_manager->getAllTeams();
                    foreach ($teams as $key => $value) {
                        $name = $value->getName();
                        echo("<option value='" . $value->getID() . "'>" . $name . "</option>");
                    }
                ?>
            </select>

        <input type="submit" value="Confirmer">
    </form>

                        <!-- ANIMATE CSS BACKGROUND -->
                        <?php require_once("../background.php"); ?>

</main>



