<?php
    require_once("./navbar.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
    $login_manager = new LoginManager();
    if(!$login_manager->checkAuthenticatedRequest()){
        header("Location:/components/login.php");
        exit();
    }
    $manager = new PlayerManager();
    

    if(!empty($_POST["first_name"]) && !empty($_POST["second_name"]) && !empty($_POST["city"]) && !empty($_POST["team"]) && !empty($_POST["game"])){
        // $statement = $mysql->prepare("INSERT INTO Game (name, station, format) VALUES (:name, :station, :format);");
        $first_name = $_POST["first_name"];
        $second_name = $_POST["second_name"];
        $city = $_POST["city"];
        $team_id = $_POST["team"];
        $game_id = $_POST["game"];
        // echo("Team: " . $team_id);
        // echo("Game: " . $game_id);
        $manager->createPlayer($first_name, $second_name, $city, intval($team_id), intval($game_id));
        // $statement->bindValue(':name', $name);
        // $statement->bindValue(':station', $station);
        // $statement->bindValue(':format', $format);
        // $statement->execute();
        
        
    }else if(!empty($_GET["delete"])){
        $id = $_GET["delete"];
        if($manager->playerExist($id)){
            $manager->deletePlayerById($id);
        }
        
    }

?>

<link rel="stylesheet" href="../style.css">
<main>
<table>
    <tr>
        <th>#</th>
        <th>First name</th>
        <th>Second name</th>
        <th>City</th>
        <th>Team #</th>
        <th>Game #</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    <!-- Add rows here -->
    <?php
    
        
        $player = new Player();
        $statement = $manager->getAllPlayers();
        $team_manager = new TeamManager();
        $game_manager = new GameManager();
        
        foreach ($statement as $key => $value) {
            # code...
            echo("<tr>");
            echo("<th>" . $value->getID() . "</th>");
            echo("<td>" . $value->getFirstName() . "</td>");
            echo("<td>" . $value->getSecondName() . "</td>");
            echo("<td>" . $value->getCity() . "</td>");
            echo("<td>" . $team_manager->getTeamByID($value->getTeamID())->getName() . "</td>");
            echo("<td>" . $game_manager->getGameByID($value->getGameID())->getName() . "</td>");
            echo("<td>" . "<a href='/components/player.php?delete=" . $value->getID() . "'>X</a>" . "</td>");
            echo("<td>" . "<a href='/components/edit.php?player=" . $value->getID() . "'>Edit</a>" . "</td>");
            echo("</tr>");
        }
    ?>
</table>

<form action="/components/player.php" method="post">
    <label for="first_name">First name</label>
    <input type="text" name="first_name" id="first_name">
    
    <label for="second_name">Second name</label>
    <input type="text" name="second_name" id="second_name">

    <label for="city">City</label>
    <input type="text" name="city" id="city">

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
    
    <label for="game">Game</label>
    <select name="game" id="game">
        <?php
        
            $game_manager = new GameManager();
            $games = $game_manager->getAllGames();
            foreach ($games as $key => $value) {
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