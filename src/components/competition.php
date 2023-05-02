<?php
    require_once("./navbar.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
    $login_manager = new LoginManager();
if(!$login_manager->checkAuthenticatedRequest()){
    header("Location:/components/login.php");
    exit();
}

$manager = new CompetManager();

if(!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["city"]) && !empty($_POST["format"]) && !empty($_POST["cash_prize"])){
    
    $name = $_POST["name"];
    $description = $_POST["description"];
    $city = $_POST["city"];
    $format = $_POST["format"];
    $cash_prize = $_POST["cash_prize"];
    
    $manager->createCompet($name, $description, $city, $format, $cash_prize);
    
    
}else if(!empty($_GET["delete"])){
    $id = $_GET["delete"];
    $manager->deleteCompetById($id);
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
            <th>Suppression</th>
            <th>Edition</th>
        </tr>
        <!-- Add rows here -->
        <?php
        
            $compet = new Competition();
            $statement = $manager->GetAllCompet();
            foreach ($statement as $key => $value) {

                $compet_id = $value->get_iD();

                echo("<tr>");
                echo("<th>" . $value->get_iD() . "</th>");
                echo("<td>" . $value->get_name() . "</td>");
                echo("<td>" . $value->get_description() . "</td>");
                echo("<td>" . $value->get_city() . "</td>");
                echo("<td>" . $value->get_format() . "</td>");
                echo("<td>" . $value->get_cash_prize() . "</td>");
                echo("<td>" . "<a href='/components/competition.php?delete=" . $compet_id . "'>X</a>" . "</td>");
                echo("<td>" . "<a href='/components/edit.php?game=" . $compet_id . "'>Edit</a>" . "</td>");
                echo("</tr>");
            }
        ?>
    </table>

    <form action="./competition.php" method="POST">
        
            <label for="name">Name</label>
            <input type="text" name="name" id="name"/>

            <label for="description">Description</label>
            <input type="text" name="description" id="description"/>

            <label for="city">City</label>
            <input type="text" name="city" id="city"/>

            <label for="format">Format</label>
            <input type="text" name="format" id="format"/>

            <label for="cash_prize">Cash Prize</label>
            <input type="text" name="cash_prize" id="cash_prize"/>

        <input type="submit" value="Confirmer">
    </form>

                        <!-- ANIMATE CSS BACKGROUND -->
                        <?php require_once("../background.php"); ?>
                        
</main>