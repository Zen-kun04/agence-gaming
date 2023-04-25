<?php
    include("./navbar.php");
    include("./managers/DBManager.php");
    include("./managers/GameManager.php");
    class Game {
        private $id;
        private $name;
        private $station;
        private $format;

        public function getID() {
            return $this->id;
        }

        public function setID(int $id){
            $this->id = $id;
        }

        public function getName() {
            return $this->name;
        }

        public function setName(string $name) {
            $this->name = $name;
        }

        public function getStation() {
            return $this->station;
        }

        public function setStation(string $station) {
            $this->station = $station;
        }

        public function getFormat() {
            return $this->format;
        }

        public function setFormat(string $format) {
            $this->$format = $format;
        }
    }


    // include("./manager.php");
    // $manager = new DBManager();
    // $mysql = new PDO(
    //     'mysql:host=localhost;dbname=gaming;charset=utf8',
    //     'root',
    //     'root'
    // );

    if(!empty($_POST["name"]) && !empty($_POST["station"]) && !empty($_POST["format"])){
        // $statement = $mysql->prepare("INSERT INTO Game (name, station, format) VALUES (:name, :station, :format);");
        // $name = $_POST["name"];
        // $station = $_POST["station"];
        // $format = $_POST["format"];
        // $statement->bindValue(':name', $name);
        // $statement->bindValue(':station', $station);
        // $statement->bindValue(':format', $format);
        // $statement->execute();
        
        
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
    
        $manager = new GameManager();
        $game = new Game();
        $statement = $manager->getAllGames();
        foreach ($statement as $key => $value) {
            # code...
            echo("<tr>");
            echo("<th>" . $value->getID() . "</th>");
            echo("<td>" . $value->getName() . "</td>");
            echo("<td>" . $value->getStation() . "</td>");
            echo("<td>" . $value->getFormat() . "</td>");
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