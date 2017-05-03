<?php
include('header.html');
//pdo_connect();
//login();
?>
    <form id="inloggen" method="post" action="foutmeldingen.php">
        <label for="gebruikersnaam">Gebruikersnaam</label><input type="text" name="gebruikersnaam"
                                                     placeholder="Gebruikersnaam">
        <label for="achternaam">Achternaam</label><input type="text" name="achternaam" id="achternaam"
                                                         placeholder="Achternaam">
        <input id="regaanmelden" type="submit" name="aanmelden" value="Aanmelden"/>
    </form>
<?php
include('footer.php');
?>