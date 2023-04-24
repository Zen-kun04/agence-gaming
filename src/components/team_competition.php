<?php
    if(isset($_POST["name"]) && isset($_POST["description"])){
        echo($_POST["name"]);
        echo($_POST["description"]);
    }
?>

<table>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
    </tr>
    <!-- Add rows here -->
    
</table>

<form action="/components/team.php" method="post">
    <label for="name"></label>
    <input type="text" name="name" id="name">

    <label for="description"></label>
    <input type="text" name="description" id="description">

    <input type="submit" value="Confirmer">
</form>