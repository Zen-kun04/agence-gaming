<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
    $login_manager = new LoginManager();
if(!$login_manager->checkAuthenticatedRequest()){
    header("Location:/components/login.php");
    exit();
}
    require_once("./navbar.php");
?>
<?php
        if(!empty($_GET["team"])){
            $team_manager = new TeamManager();
            if(!empty($_POST["name"]) && !empty($_POST["description"])){

                $new_team = new Team();
                $new_team->setID($_GET["team"]);
                $new_team->setName($_POST["name"]);
                $new_team->setDescription($_POST["description"]);
                $team_manager->updateTeam($new_team);
                
                // header("Location:/components/team.php");
                // exit();
            }
            $html_table = "<table>\n"
            . "<tr>\n"
            . "<th>#</th>\n"
            . "<th>Name</th>\n"
            . "<th>Description</th>\n"
            . "</tr>"
            . "<tr>";
            
            $team_id = $_GET['team'];

            
            $team_manager = new TeamManager();
            $team = $team_manager->getTeamByID($team_id);
            $html = "<th>\n"
            . $team->getID() . "\n"
            . "</th>\n"

            ."<td>\n"
            . $team->getName() . "\n"
            . "</td>\n"

            ."<td>\n"
            . $team->getDescription() . "\n"
            . "</td>\n";
                

            $html_end_table = "</tr>\n"
            . "</table>";

            

            $html_form =
              "<form action='/components/edit.php?team=" . $team_id . "' method='post'>"
            . "<label for='name'>Name</label>"
            . "<input type='text' name='name' value='" . $team->getName() . "'>"

            . "<label for='description'>Description</label>"
            . "<input type='text' name='description' value='" . $team->getDescription() . "'>"

            . "<input type='submit'>"
            . "</form>";


            $team_manager = new TeamManager();
            if ($team_manager->teamExist(intval($_GET["team"]))) {
                echo($html_table);
                echo($html);
                echo($html_end_table);
                echo($html_form);
            }
        }
?>