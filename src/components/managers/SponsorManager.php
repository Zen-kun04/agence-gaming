<?php
    class SponsorManager extends DBManager
    {

        public function getAllSponsors()
        {
            $prepare = $this->getConnection()->query("SELECT * FROM Sponsor");
            $sponsors = [];
            foreach ($prepare as $sponsorData) {
                $sponsor = new Sponsor();
                $sponsor->setId(intval($sponsorData["id"]));
                $sponsor->setBrand($sponsorData["brand"]);
                $sponsor->set_team_id($sponsorData["team_id"]);
                $sponsors[] = $sponsor;
            }
            return $sponsors;
        }

        public function deleteSponsorById(int $id)
        {
            $data = $prepare = $this->getConnection()->prepare("DELETE FROM Sponsor WHERE id = ?");
            $prepare->execute([$id]);
            // header("location:" . $_SERVER["PHP_SELF"]);

            // exit();
            return !empty($data->fetch());
        }

        public function sponsorExist (int $id) {
        $data = $prepare = $this->getConnection()->prepare("SELECT * FROM `Sponsor` Where id = ?");
        $prepare->execute([$id]);

        return !empty($data->fetch());
        }

        public function getSponsorById(int $id)
        {
            $data = $prepare = $this->getConnection()->prepare("SELECT * FROM `Sponsor` WHERE id=?;");
            $prepare->execute([$id]);
            foreach ($data as $key => $value) {
                $sponsor = new Sponsor;
                $sponsor->setId($value["id"]);
                $sponsor->setBrand($value["brand"]);
                $sponsor->set_team_id($value["team_id"]);
                return $sponsor;
            }
            return null;
        }

        public function updateSponsor (Sponsor $sponsor) {
        $prepare = $this->getConnection()->prepare("UPDATE Sponsor SET brand = ?, team_id = ? WHERE id = ?");
        $prepare->execute([
            $sponsor->getBrand(),
            $sponsor->get_team_id(),
            $sponsor->getId()
        ]);
    }

        public function createSponsor(string $brand, int $team_id)
        {
            $prepare = $this->getConnection()->prepare("INSERT INTO Sponsor (brand, team_id) VALUES (:brand, :team_id);");
            $prepare->bindValue(":brand", $brand);
            $prepare->bindValue(":team_id", $team_id);
            $prepare->execute();
        }
    }
?>