<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
    require_once("./navbar.php");
?>
<main>
    <?php
        if(!empty($_GET["player"])){
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

            $player_manager = new PlayerManager();
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


            $html_form =
              "<form action='/edit.php'>"
            . ""
            . ""
            . ""
            . ""
            . ""
            . ""
            . "";


            $player_manager = new PlayerManager();
            if ($player_manager->playerExist(intval($_GET["player"]))) {
                echo($html_table);
                echo ($html);
                echo($html_end_table);
            }
        }
    ?>
</main>
<script src="playerE.js"></script>
        
    
