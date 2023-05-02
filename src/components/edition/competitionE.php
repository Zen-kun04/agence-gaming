<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
    $login_manager = new LoginManager();
if(!$login_manager->checkAuthenticatedRequest()){
    header("Location:/components/login.php");
    exit();
}


    if(!empty($_GET["game"])){
        $game_id = intval($_GET["game"]);
        $game_manager = new GameManager();
        $game = $game_manager->getGameByID($game_id);
        if(!empty($_POST["name"]) && 
        !empty($_POST["station"]) && 
        !empty($_POST["format"])){
            $new_game = new Game();
            $new_game->setID($game_id);
            $new_game->setName($_POST["name"]);
            $new_game->setStation($_POST["station"]);
            $new_game->setFormat($_POST["format"]);
            $game_manager->updateGame($new_game);

            header("Location:/components/game.php");
            exit();
        }
        $html_table =
        "<table>\n"
        . "<tr>\n"

        . "<th>\n"
        . "#"
        . "</th>\n"

        . "<th>\n"
        . "Name"
        . "</th>\n"

        . "<th>\n"
        . "Station"
        . "</th>\n"

        . "<th>\n"
        . "Format"
        . "</th>\n"

        . "</tr>\n"
        . "";

        

        $html_second_table =
        "<tr>"
        . "<th>"
        . $game->getID()
        . "</th>"
        . "<td>"
        . $game->getName()
        . "</td>"
        . "<td>"
        . $game->getStation()
        . "</td>"
        . "<td>"
        . $game->getFormat()
        . "</td>"
        . "</tr>"
        . "</table>";

        echo($html_table);
        echo($html_second_table);

        $stations = "";

        foreach ($game_manager->getAllStations() as $key => $value) {
            if($value["station"] !== $game->getStation()){
                $stations .= "<option value='" . $value["station"] . "'>"
                . $value["station"]
                . "</option>";
            }
        }

        $formats = "";

        foreach ($game_manager->getAllFormats() as $key => $value) {
            
            if($value["format"] !== $game->getFormat()){
                $formats .= "<option value='" . $value["format"] . "'>"
                . $value["format"]
                . "</option>";
            }
        }

        $html_form = 
        "<form action='/components/edit.php?game=" . $game->getID() . "' method='post'>"
        . "<label for='name'>"
        . "Name"
        . "</label>"
        . "<input type='text' name='name' value='" . $game->getName() . "'>"

        . "<label for='station'>"
        . "Station"
        . "</label>"
        . "<select name='station'>"
        . "<option value='" . $game->getStation() . "'>"
        . $game->getStation()
        . "</option>" 
        . $stations
        . "</select>"

        . "<label for='format'>"
        . "Format"
        . "</label>"
        . "<select name='format'>"
        . "<option value='" . $game->getFormat() . "'>"
        . $game->getFormat()
        . "</option>" 
        . $formats
        . "</select>"

        . "<input type='submit'>"
        . "</form>";

        echo($html_form);

    }
?>