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
        if(!empty($_GET["player"])){
            $player_manager = new PlayerManager();
            if(!empty($_POST["first_name"]) && !empty($_POST["second_name"]) &&
            !empty($_POST["city"]) && !empty($_POST["team"]) &&
            !empty($_POST["game"])){
                // echo($_POST["first_name"]);
                // echo($_POST["second_name"]);
                // echo($_POST["city"]);
                // echo($_POST["team"]);
                // echo($_POST["game"]);
                $new_player = new Player();
                $new_player->setID($_GET["player"]);
                $new_player->setFirstName($_POST["first_name"]);
                $new_player->setSecondName($_POST["second_name"]);
                $new_player->setCity($_POST["city"]);
                $new_player->setGameID(intval($_POST["game"]));
                $new_player->setTeamID(intval($_POST["team"]));
                $player_manager->updatePlayer($new_player);
                header("Location:/components/player.php");
                exit();
            }
            $html_table = "<table>\n"
            . "<tr>\n"
            . "<th>#</th>\n"
            . "<th>First name</th>\n"
            . "<th>Second name</th>\n"
            . "<th>City</th>\n"
            . "<th>Team #</th>"
            . "<th>Game #</th>"
            . "</tr>"
            . "<tr>";
            
            $player_id = $_GET['player'];

            
            $team_manager = new TeamManager();
            $game_manager = new GameManager();
            $player = $player_manager->getPlayerByID($player_id);
            $html = "<th>\n"
            . $player->getID() . "\n"
            . "</th>\n"

            ."<td>\n"
            . $player->getFirstName() . "\n"
            . "</td>\n"

            ."<td>\n"
            . $player->getSecondName() . "\n"
            . "</td>\n"

            ."<td>\n"
            . $player->getCity() . "\n"
            . "</td>\n"

            ."<td>\n"
            . $team_manager->getTeamByID($player->getTeamID())->getName() . "\n"
            . "</td>\n"

            ."<td>\n"
            . $game_manager->getGameByID($player->getGameID())->getName() . "\n"
            . "</td>\n";
                

            $html_end_table = "</tr>\n"
            . "</table>";

            $options = "";
            foreach ($team_manager->getAllTeams() as $key => $value) {
                # code...
                if($value->getName() !== $team_manager->getTeamByID($player->getTeamID())->getName()){
                    $options .= "<option value='" . $value->getId() . "'>" . $value->getName() . "</option>";
                }
                
            };

            $games = "";
            foreach ($game_manager->getAllGames() as $key => $value) {
                # code...
                if($value->getName() !== $game_manager->getGameByID($player->getGameID())->getName()){
                    $games .= "<option value='" . $value->getID() . "'>" . $value->getName() . "</option>";
                }
                
            };

            $html_form =
              "<form action='/components/edit.php?player=" . $player_id . "' method='post'>"
            . "<label for='first_name'>First Name</label>"
            . "<input type='text' name='first_name' value='" . $player->getFirstName() . "'>"

            . "<label for='second_name'>Second Name</label>"
            . "<input type='text' name='second_name' value='" . $player->getSecondName() . "'>"

            . "<label for='city'>City</label>"
            . "<input type='text' name='city' value='" . $player->getCity() . "'>"

            . "<select name='team'>"
            . "<option value='" . $player->getTeamID() . "'>" . $team_manager->getTeamByID($player->getTeamID())->getName() . "</option>"
            . $options
            . "</select>"
            . "<select name='game'>"
            . "<option value='" . $player->getGameID() . "'>" . $game_manager->getGameByID($player->getGameID())->getName() . "</option>"
            . $games
            . "</select>"
            . "<input type='submit'>"
            . "</form>";


            $player_manager = new PlayerManager();
            if ($player_manager->playerExist(intval($_GET["player"]))) {
                echo($html_table);
                echo ($html);
                echo($html_end_table);

                echo($html_form);
            }
        }
    ?>
<script src="playerE.js"></script>
        
    
