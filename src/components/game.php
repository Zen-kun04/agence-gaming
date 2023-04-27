<?php
    include_once("./navbar.php");
    include_once(__DIR__ . "/managers/DBManager.php");
    include_once("./managers/GameManager.php");
    include_once("./classes/gameC.php");
    $manager = new GameManager();
    


    // include("./manager.php");
    // $manager = new DBManager();
    // $mysql = new PDO(
    //     'mysql:host=localhost;dbname=gaming;charset=utf8',
    //     'root',
    //     'root'
    // );

    if(!empty($_POST["name"]) && !empty($_POST["station"]) && !empty($_POST["format"])){
        // $statement = $mysql->prepare("INSERT INTO Game (name, station, format) VALUES (:name, :station, :format);");
        $name = $_POST["name"];
        $station = $_POST["station"];
        $format = $_POST["format"];
        
        $manager->createGame($name, $station, $format);
        // $statement->bindValue(':name', $name);
        // $statement->bindValue(':station', $station);
        // $statement->bindValue(':format', $format);
        // $statement->execute();
        
        
    }else if(!empty($_GET["delete"])){
        $id = $_GET["delete"];
        $manager->deleteGameById($id);
    }
?>
<link rel="stylesheet" href="../table.css">
<link rel="stylesheet" href="../main.css">
<main>
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Station</th>
            <th>Format</th>
            <th>Suppression</th>
            <th>Edition</th>
        </tr>
        <!-- Add rows here -->
        <?php
        
            
            $game = new Game();
            $statement = $manager->getAllGames();
            foreach ($statement as $key => $value) {
                # code...
                echo("<tr>");
                echo("<th>" . $value->getID() . "</th>");
                echo("<td>" . $value->getName() . "</td>");
                echo("<td>" . $value->getStation() . "</td>");
                echo("<td>" . $value->getFormat() . "</td>");
                echo("<td>" . "<a href='/components/game.php?delete=" . $value->getID() . "'>X</a>" . "</td>");
                echo("<td>" . "Edit" . "</td>");
                echo("</tr>");
            }
        ?>
    </table>
    <form action="/components/game.php" method="post">
        <label for="name">Titre</label>
        <input type="text" name="name" id="name">

        <label for="station">Plateforme</label>
        <select name="station" id="">
            <?php
                $statement = $manager->getAllStations();
                foreach ($statement as $key => $value) {
                    # code...
                    
                    echo("<option name='" . $value["station"] . "'>" . $value["station"] . "</option>");
                    
                }
            ?>
        </select>
        
        <label for="format">Genre</label>
        <select name="format" id="">
            <?php
                $statement = $manager->getAllFormats();
                foreach ($statement as $key => $value) {
                    # code...
                    
                    echo("<option name='" . $value["format"] . "'>" . $value["format"] . "</option>");
                    
                }
            ?>
        </select>

        <input type="submit" value="Confirmer">
    </form>
</main>
