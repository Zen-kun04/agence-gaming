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
        if(!empty($_GET["Competition"])){
            $competition_id = intval($_GET["Competition"]);
            $competition_manager = new CompetManager();
            $competition = $competition_manager->getCompetByID($competition_id);
            if(!empty($_POST["name"]) && 
            !empty($_POST["description"]) && 
            !empty($_POST["city"]) &&
            !empty($_POST["format"]) &&
            !empty($_POST["cash_prize"]) ){
                $new_compet = new Competition();
                $new_compet->set_iD($competition_id);
                $new_compet->set_name($_POST["name"]);
                $new_compet->set_description($_POST["description"]);
                $new_compet->set_city($_POST["city"]);
                $new_compet->set_format($_POST["format"]);
                $new_compet->set_cash_prize($_POST["cash_prize"]);
                $competition_manager->updateCompet($new_compet);
            }

        $html_table =
        "<table>\n"
        . "<tr>\n"

        . "<th>\n"
        . "#"
        . "</th>\n"

        . "<th>\n"
        . "Name"
        . "</th>\n"

        . "<th>\n"
        . "Description"
        . "</th>\n"

        . "<th>\n"
        . "City"
        . "</th>\n"

        . "<th>\n"
        . "Format"
        . "</th>\n"

        . "<th>\n"
        . "Cash Prize"
        . "</th>\n"

        . "</tr>\n"
        . "";
            
            $compet_id = $_GET['competition'];
            $competition_manager = new CompetManager();
            $compet = $competition_manager->getCompetByID($compet_id);

            $html = "<tr>"
            . "<th>"
            . $compet->get_iD()
            . "</th>"
            . "<td>"
            . $compet->get_name()
            . "</td>"
            . "<td>"
            . $compet->get_description()
            . "</td>"
            . "<td>"
            . $compet->get_city()
            . "</td>"
            . "<td>"
            . $compet->get_format()
            . "</td>"
            . "<td>"
            . $compet->get_cash_prize()
            . "</td>"
            . "</tr>"
            . "</table>";

            $html_form =
              "<form action='/components/edit.php?competition=" . $compet_id . "' method='post'>"
            . "<label for='name'>Name</label>"
            . "<input type='text' name='name' value='" . $compet->get_name() . "'>"

            . "<label for='description'>Description</label>"
            . "<input type='text' name='description' value='" . $compet->get_description() . "'>"

            . "<label for='description'>Description</label>"
            . "<input type='text' name='description' value='" . $compet->get_city() . "'>"

            . "<label for='description'>Description</label>"
            . "<input type='text' name='description' value='" . $compet->get_format() . "'>"

            . "<label for='description'>Description</label>"
            . "<input type='text' name='description' value='" . $compet->get_cash_prize() . "'>"

            . "<input type='submit'>"
            . "</form>";

            $competition_manager = new CompetManager();
            if ($competition_manager->competExist(intval($_GET["competition"]))) {
                echo($html_table);
                echo($html);
                echo($html_end_table);
                echo($html_form);
            }
        }
?>