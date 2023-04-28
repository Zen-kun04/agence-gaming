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

            $sponsors[] = $sponsor;
        }
        return $sponsors;
    }

    public function deleteSponsorbyId(int $id)
    {
        $prepare = $this->getConnection()->prepare("DELETE FROM Sponsor WHERE id = ?");
        $prepare->execute([$id]);
        header("location:" . $_SERVER["PHP_SELF"]);
        exit();
    }


    public function createSponsor(string $brand)
    {
        $prepare = $this->getConnection()->prepare("INSERT INTO Sponsor (brand) VALUES (:brand);");
        $prepare->bindValue(":brand", $brand);
        $prepare->execute();
    }
}
