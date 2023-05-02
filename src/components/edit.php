<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/components/requirements.php");
$login_manager = new LoginManager();
if(!$login_manager->checkAuthenticatedRequest()){
    header("Location:/components/login.php");
    exit();
}
    require_once("./navbar.php");
?>
<main>
<?php
    require_once("./edition/gameE.php");
    require_once("./edition/playerE.php");
    require_once("./edition/teamE.php");
    require_once("./edition/sponsorE.php");


?>

</main>