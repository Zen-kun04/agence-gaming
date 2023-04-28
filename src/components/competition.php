<?php
    require_once("./navbar.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
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

                        <!-- ANIMATE CSS BACKGROUND -->
                        <?php require_once("../background.php"); ?>
                        
</main>