<?php
    $mysql = new PDO(
        'mysql:host=localhost;dbname=gaming;charset=utf8',
        'root',
        'root'
    );

    if(!empty($_POST["name"]) && !empty($_POST["station"]) && !empty($_POST["format"])){
        $statement = $mysql->prepare("INSERT INTO Game (name, station, format) VALUES (:name, :station, :format);");
        $name = $_POST["name"];
        $station = $_POST["station"];
        $format = $_POST["format"];
        $statement->bindValue(':name', $name);
        $statement->bindValue(':station', $station);
        $statement->bindValue(':format', $format);
        $statement->execute();
        
        
    }
?>

<table>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Station</th>
        <th>Format</th>
    </tr>
    <!-- Add rows here -->
    <?php
        $statement = $mysql->prepare("SELECT * FROM Game");
        $statement->execute();
        foreach ($statement->fetchAll() as $key => $value) {
            # code...
            echo("<tr>");
            echo("<th>" . $value["id"] . "</th>");
            echo("<td>" . $value["name"] . "</td>");
            echo("<td>" . $value["station"] . "</td>");
            echo("<td>" . $value["format"] . "</td>");
            echo("</tr>");
        }
    ?>
</table>

<form action="/components/game.php" method="post">
    <label for="name"></label>
    <input type="text" name="name" id="name">

    <label for="station"></label>
    <input type="text" name="station" id="station">
    
    <label for="format"></label>
    <input type="text" name="format" id="format">

    <input type="submit" value="Confirmer">
</form>