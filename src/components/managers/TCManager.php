<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
    class TCManager extends DBManager {

        public function get_tc() {
            $prepare = $this->getConnection()->query("SELECT t.id, t.name, c.id, c.name FROM Team AS t, Competition AS c, team_competition AS tc WHERE tc.team_id = t.id AND tc.competition_id = c.id;");
            $tc = [];
            foreach ($prepare as $tc_data) {
                // echo("Data: " . json_encode($tc_data));
                $team_compet = new TeamCompetition();
                $team_compet->set_team_iD($tc_data[0]);
                $team_compet->set_team_name($tc_data[1]);
                $team_compet->set_compet_iD($tc_data[2]);
                $team_compet->set_compet_name($tc_data[3]);
                
                $tc[] = $team_compet;
            }
                return $tc;
        }


        public function deleteTCById(int $id) {
            $prepare = $this->getConnection()->prepare("DELETE FROM `team_competition` WHERE id = ?");
            $prepare->execute([
                $id
            ]);
        }

        public function getTCByID(int $id) {
            $data = $prepare = $this->getConnection()->prepare("SELECT * FROM team_competition WHERE id = ?;");
            $prepare->execute([
                $id
            ]);
            foreach ($data as $key => $value) {
                $tc = new TeamCompetition();
                $tc->set_iD($value["id"]);
                $tc->set_compet_iD($value["team_id"]);
                $tc->set_compet_name($value["team_id"]);
                $tc->set_team_iD($value["game_id"]);
                $tc->set_team_name($value["team_id"]);
                return $tc;
            }
            return null;
        }

        public function createTC(int $team_id, int $compet_id) {

            $prepare = $this->getConnection()->prepare("INSERT INTO `team_competition` (team_id, competition_id)
            VALUES
            (:team_id, :game_id);");
            $prepare->bindValue(":team_id", $team_id);
            $prepare->bindValue(":game_id", $compet_id);
            
            $prepare->execute();
        }

    };



?>