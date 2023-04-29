<?php
    require_once("./requirements.php");
    $manager = new LoginManager();
    if(!empty($_POST["username"]) && !empty($_POST["password"])){
        $login = new Login();
        $username = $_POST["username"];
        $password = $_POST["password"];
        $login->setUsername($username);
        $login->setRawPassword($password);
        if($manager->isValidPassword($login)){
            setcookie("username", $username, 0, "/");
            setcookie("password", $manager->hashRawPassword($login), 0, "/");
            header("Location:/");
            exit();
        }else{
            echo("Bad password");
        }
            
        
    }
?>

<main>
    <form action="/components/login.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Login">
    </form>
</main>