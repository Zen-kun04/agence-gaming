<?php
    if(isset($_POST["name"]) && isset($_POST["station"]) && isset($_POST["format"])){
        echo($_POST["name"]);
        echo($_POST["station"]);
        echo($_POST["format"]);
    }
?>

<table>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Station</th>
        <th>Format</th>
    </tr>
    <!-- Add rows here -->
</table>

<form action="/components/game.php" method="post">
    <label for="name"></label>
    <input type="text" name="name" id="name">

    <label for="station"></label>
    <input type="text" name="station" id="name">
    
    <label for="format"></label>
    <input type="text" name="format" id="name">

    <input type="submit" value="Confirmer">
</form>