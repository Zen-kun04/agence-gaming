<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
?>

<table>
    <tr>
        <th>#</th>
        <th>First name</th>
        <th>Second name</th>
        <th>City</th>
        <th>Team #</th>
        <th>Game #</th>
    </tr>
    <tr>
        <?php
            if(!empty($_GET["player"])){
                $html = "<th>\n"
                    . "  test "
                    . $_GET['player'] . "\n"
                    . "</th>\n";
                $player_manager = new PlayerManager();
                if ($player_manager->playerExist(intval($_GET["player"]))) {
                    echo $html;
                }
            }else{
                echo("yamete");
            }
        ?>
    </tr>
</table>