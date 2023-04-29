<?php
    require_once("./components/requirements.php");
    $login_manager = new LoginManager();
    if(!$login_manager->checkAuthenticatedRequest()){
        header("Location:/components/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agence Gaming</title>
    <link rel="stylesheet" href="./style.css">

</head>

<body>

    <header>
        <?php require_once("./components/navbar.php"); ?>
    </header>

                <!-- ANIMATE CSS BACKGROUND -->
                <?php require_once("./background.php"); ?>

    <main>
        <?php require_once("./components/cards.php"); ?>

        <div id="container">

        </div>

    </main>
</body>

</html>