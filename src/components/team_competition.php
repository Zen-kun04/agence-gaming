<?php
    require_once("./navbar.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
    $login_manager = new LoginManager();
    if(!$login_manager->checkAuthenticatedRequest()){
        header("Location:/components/login.php");
        exit();
    }
    $manager = new TCManager;


if(!empty($_POST["team"]) && !empty($_POST["competition"])){

    $team_id = intval($_POST["team"]);
    $tc_id = intval($_POST["competition"]);
    $manager->createTC(intval($team_id), intval($tc_id));
    exit();
    
}
?>
<main>
    <link rel="stylesheet" href="../style.css">

        <table>
            <tr>
                <th>#</th>
                <th>Team</th>
                <th>Competition</th>
            </tr>
            <!-- Add rows here -->
            <?php

            $team_manager = new TeamManager();
            $compet_manager = new CompetManager();

                foreach ($manager->get_tc() as $key => $value) {
                    echo("<tr>");
                    // ...
                    echo("<td>" . $key + 1 . "</td>");
                    echo("<td value='" . $value->get_team_iD() . "'>" . $team_manager->getTeamByID($value->get_team_iD())->getName() . "</td>");
                    echo("<td value='" . $value->get_compet_iD() . "'>" . $compet_manager->getCompetByID($value->get_compet_iD())->get_name() . "</td>");

                    echo("</tr>");
                }
            ?>
        </table>

        <form action="/components/team_competition.php" method="post">
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
            
            <label for="competition">Competition</label>
            <select name="competition" id="competition">
                <?php
                
                    $compet_manager = new CompetManager();
                    $compet = $compet_manager->GetAllCompet();
                    foreach ($compet as $key => $value) {
                        $name = $value->get_name();
                        echo("<option value='" . $value->get_iD() . "'>" . $name . "</option>");
                    }
                ?>
            </select>

        <input type="submit" value="Confirmer">
    </form>

                        <!-- ANIMATE CSS BACKGROUND -->
                        <?php require_once("../background.php"); ?>
                        
</main>