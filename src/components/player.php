<?php
    include("./navbar.php");
    include("./managers/DBManager.php");
    include("./managers/PlayerManager.php");
    $manager = new PlayerManager();
    class Player {
        
        private $id;
        private $first_name;
        private $second_name;
        private $city;
        private $team_id;
        private $game_id;


        public function getID() {
            return $this->id;
        }

        public function setID(int $id) {
            $this->id = $id;
        }

        public function getFirstName() {
            return $this->first_name;
        }

        public function setFirstName(string $first_name) {
            $this->first_name = $first_name;
        }

        public function getSecondName() {
            return $this->second_name;
        }

        public function setSecondName(string $second_name) {
            $this->second_name = $second_name;
        }

        public function getCity() {
            return $this->city;
        }

        public function setCity(string $city) {
            $this->city = $city;
        }

        public function getTeamID() {
            return $this->team_id;
        }

        public function setTeamID(string $team_id) {
            $this->team_id = $team_id;
        }

        public function getGameID() {
            return $this->game_id;
        }

        public function setGameID(string $game_id) {
            $this->game_id = $game_id;
        }
    }


?>

<link rel="stylesheet" href="../table.css">
<table>
    <tr>
        <th>#</th>
        <th>First name</th>
        <th>Second name</th>
        <th>City</th>
        <th>Team #</th>
        <th>Game #</th>
    </tr>
    <!-- Add rows here -->
    <?php
    
        
        $player = new Player();
        $statement = $manager->getAllPlayers();
        foreach ($statement as $key => $value) {
            # code...
            echo("<tr>");
            echo("<th>" . $value->getID() . "</th>");
            echo("<td>" . $value->getFirstName() . "</td>");
            echo("<td>" . $value->getSecondName() . "</td>");
            echo("<td>" . $value->getCity() . "</td>");
            echo("<td>" . $value->getTeamID() . "</td>");
            echo("<td>" . $value->getGameID() . "</td>");
            echo("</tr>");
        }
    ?>
</table>

<form action="/components/player.php" method="post">
    <label for="name"></label>
    <input type="text" name="name" id="name">

    <label for="station"></label>
    <input type="text" name="station" id="station">
    
    <label for="format"></label>
    <input type="text" name="format" id="format">

    <input type="submit" value="Confirmer">
</form>