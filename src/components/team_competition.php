<?php
    include_once("./navbar.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
    $manager = new TCManager;
class TeamCompetition {
        
    private $id;
    private $team_id;
    private $team_name;
    private $compet_id;
    private $compet_name;


    public function get_iD() {
        return $this->id;
    }

    public function set_iD(int $id) {
        $this->id = $id;
    }

    public function get_team_iD() {
        return $this->team_id;
    }

    public function set_team_iD(string $team_id) {
        $this->team_id = $team_id;
    }

    public function get_team_name() {
        return $this->team_name;
    }

    public function set_team_name(string $team_name) {
        $this->team_name = $team_name;
    }

    public function get_compet_iD() {
        return $this->compet_id;
    }

    public function set_compet_iD(string $compet_id) {
        $this->compet_id = $compet_id;
    }

    public function get_compet_name() {
        return $this->compet_name;
    }

    public function set_compet_name(string $compet_name) {
        $this->compet_name = $compet_name;
    }
}


if(!empty($_POST["team"]) && !empty($_POST["tc"])){

    $team_id = $_POST["team"];
    $tc_id = $_POST["tc"];

    $manager->createTC(intval($team_id), intval($tc_id));
    
    
}
?>
<main>
    <link rel="stylesheet" href="../style.css">

        <table>
            <tr>
                <th>#</th>
                <th>Team</th>
                <th>Competition</th>
            </tr>
            <!-- Add rows here -->
            
        </table>

        <form action="/components/team_competition.php" method="post">
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
            
            <label for="team_competition">Team Competition</label>
            <select name="team_competition" id="team_competition">
                <?php
                
                    $tc_manager = new TCManager();
                    $tc = $tc_manager->get_tc();
                    foreach ($tc as $key => $value) {
                        $name = $value->get_compet_name();
                        echo("<option value='" . $value->get_compet_iD() . "'>" . $name . "</option>");
                    }
                ?>
            </select>

        <input type="submit" value="Confirmer">
    </form>

                        <!-- ANIMATE CSS BACKGROUND -->
                        <?php require_once("../background.php"); ?>
                        
</main>