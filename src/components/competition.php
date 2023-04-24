<?php
    
?>

<form action="./index.php" method="POST">
    <div>
        <label for="name">Prénom</label>
        <input type="text" name="name" id="name"/>
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description" id="description"/>
    </div>
    <div>
        <label for="city">City</label>
        <input type="text" name="city" id="city"/>
    </div>
    <div>
        <label for="format">Format</label>
        <input type="text" name="format" id="format"/>
    </div>
    <div>
        <label for="cash_prize">Cash Prize</label>
        <input type="text" name="cash_prize" id="cash_prize"/>
    </div>
    <input type="submit" value="Envoyer">
</form>