<?php 
    class CompetManager extends DBManager {
        public function GetAllCompet()
        {
            $prepare = $this->getConnection()->query("SELECT * FROM `Competition`");
            $competitions = [];
            foreach ($prepare as $compet_data) {
                $compet = new Competition();
                $compet->set_iD($compet_data["id"]);
                $compet->set_name($compet_data["name"]);
                $compet->set_description($compet_data["description"]);
                $compet->set_city($compet_data["city"]);
                $compet->set_format($compet_data["format"]);
                $compet->set_cash_prize($compet_data["cash_prize"]);


                $competitions[] = $compet;
            }
            return $competitions;
        }
    }
?>