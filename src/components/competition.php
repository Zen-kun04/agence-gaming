<?php
    require_once("./navbar.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
class Competition {
        private $id;
        private $name;
        private $description;
        private $city;
        private $format;
        private $cash_prize;

        public function get_iD() {
            return $this->id;
        }

        public function set_iD(int $id){
            $this->id = $id;
        }

        public function get_name() {
            return $this->name;
        }

        public function set_name(string $name) {
            $this->name = $name;
        }

        public function get_description() {
            return $this->description;
        }

        public function set_description(string $description) {
            $this->description = $description;
        }

        public function get_city() {
            return $this->city;
        }

        public function set_city(string $city) {
            $this->city = $city;
        }

        public function get_format() {
            return $this->format;
        }

        public function set_format(string $format) {
            $this->$format = $format;
        }

        public function get_cash_prize() {
            return $this->cash_prize;
        }

        public function set_cash_prize(int $cash_prize){
            $this->cash_prize = $cash_prize;
        }
    }

    
?>
<main>
    <link rel="stylesheet" href="../style.css">
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>City</th>
            <th>Format</th>
            <th>Cash Prize</th>
        </tr>
        <!-- Add rows here -->
        <?php
        
            $manager = new CompetManager();
            $game = new Competition();
            $statement = $manager->GetAllCompet();
            foreach ($statement as $key => $value) {
                echo("<tr>");
                echo("<th>" . $value->get_iD() . "</th>");
                echo("<td>" . $value->get_name() . "</td>");
                echo("<td>" . $value->get_description() . "</td>");
                echo("<td>" . $value->get_city() . "</td>");
                echo("<td>" . $value->get_format() . "</td>");
                echo("<td>" . $value->get_cash_prize() . "</td>");
                echo("</tr>");
            }
        ?>
    </table>

    <form action="./index.php" method="POST">
        
            <label for="name">Prénom</label>
            <input type="text" name="name" id="name"/>

            <label for="description">Description</label>
            <input type="text" name="description" id="description"/>

            <label for="city">City</label>
            <input type="text" name="city" id="city"/>

            <label for="format">Format</label>
            <input type="text" name="format" id="format"/>

            <label for="cash_prize">Cash Prize</label>
            <input type="text" name="cash_prize" id="cash_prize"/>

        <input type="submit" value="Envoyer">
    </form>
</main>