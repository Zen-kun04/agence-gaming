<?php 
    class CompetManager extends DBManager {
        public function GetAllCompet() {
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

        public function deleteCompetById(int $id) {
            $prepare = $this->getConnection()->prepare("DELETE FROM `Competition` WHERE id = ?");
            $prepare->execute([
                $id
            ]);
        }

        public function competExist(int $id) {
            $data = $prepare = $this->getConnection()->prepare("SELECT * FROM `Competition` WHERE id = ?");
            $prepare->execute([
                $id
            ]);

            return !empty($data->fetch());
        }


        public function getCompetByID(int $id) {
            $data = $prepare = $this->getConnection()->prepare("SELECT * FROM Competition WHERE id = ?;");
            $prepare->execute([
                $id
            ]);
            foreach ($data as $key => $value) {
                $competition = new Competition();
                $competition->set_iD($value["id"]);
                $competition->set_name($value["name"]);
                $competition->set_description($value["description"]);
                $competition->set_city($value["city"]);
                $competition->set_format($value["format"]);
                $competition->set_cash_prize($value["cash_prize"]);

                return $competition;
            }
            return null;
        }

        public function updateCompet(Competition $compet) {
            $prepare = $this->getConnection()->prepare("UPDATE Competition SET name = ?, description = ?, city = ?, format = ?, cash_prize = ? WHERE id = ?");
            $prepare->execute([
                $compet->get_name(),
                $compet->get_city(),
                $compet->get_description(),
                $compet->get_format(),
                $compet->get_cash_prize(),
                $compet->get_iD()
            ]);
        }


        public function createCompet(string $name, string $description, string $city, string $format, int $cash_prize) 
        {

            $prepare = $this->getConnection()->prepare("INSERT INTO `Competition` (name, description, city, format, cash_prize) VALUES
            (:name, :description, :city, :format, :cash_prize);");

            $prepare->bindValue(":name", $name);
            $prepare->bindValue(":description", $description);
            $prepare->bindValue(":city", $city);
            $prepare->bindValue(":format", $format);
            $prepare->bindValue(":cash_prize", $cash_prize);
            $prepare->execute();
        }


    }    
?>