<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
    $login_manager = new LoginManager();
if(!$login_manager->checkAuthenticatedRequest()){
    header("Location:/components/login.php");
    exit();
}
    require_once("./navbar.php");
?>
<?php
        if(!empty($_GET["sponsor"])){
            $sponsor_manager = new SponsorManager();
            if(!empty($_POST["brand"]) && !empty($_POST["team_id"])){

                $new_sponsor = new Sponsor();
                $new_sponsor->setID($_GET["sponsor"]);
                $new_sponsor->setBrand($_POST["brand"]);
                $new_sponsor->set_team_id($_POST["team_id"]);
                $sponsor_manager->updateSponsor($new_sponsor);
                
                // header("Location:/components/sponsor.php");
                // exit();
            }
            $html_table = "<table>\n"
            . "<tr>\n"
            . "<th>#</th>\n"
            . "<th>Brand</th>\n"
            . "<th>Team</th>\n"
            . "</tr>"
            . "<tr>";
            
            $sponsor_id = $_GET['sponsor'];

            
            $sponsor_manager = new SponsorManager();
            $sponsor = $sponsor_manager->getSponsorByID($sponsor_id);
            $html = "<th>\n"
            . $sponsor->getID() . "\n"
            . "</th>\n"

            ."<td>\n"
            . $sponsor->getBrand() . "\n"
            . "</td>\n"

            ."<td>\n"
            . $sponsor->get_team_id() . "\n"
            . "</td>\n";
                

            $html_end_table = "</tr>\n"
            . "</table>";

            

            $html_form =
              "<form action='/components/edit.php?sponsor=" . $sponsor_id . "' method='post'>"
            . "<label for='brand'>Marque</label>"
            . "<input type='text' name='brand' value='" . $sponsor->getBrand() . "'>"

            . "<label for='team_id'>Team</label>"
            . "<input type='text' name='team_id' value='" . $sponsor->get_team_id() . "'>"

            . "<input type='submit'>"
            . "</form>";


            $sponsor_manager = new SponsorManager();
            if ($sponsor_manager->sponsorExist(intval($_GET["sponsor"]))) {
                echo($html_table);
                echo($html);
                echo($html_end_table);
                echo($html_form);
            }
        }
?>