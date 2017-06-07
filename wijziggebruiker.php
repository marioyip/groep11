<?php
/**
 * Created by PhpStorm.
 * User: Mario
 * Date: 6-6-2017
 * Time: 13:43
 */

require_once 'includes/functies.php';
connectToDatabase();

if (isset($_POST['submit'])) {
    $Gebruikersnaam= $_POST['voorwerp'];
    $Voornaam = strip_tags($_POST['titel']);
    $Achternaam = strip_tags($_POST['beschrijving']);
    $GeboorteDag = strip_tags($_POST['startprijs']);
    $Mailbox = strip_tags($_POST['verkoopprijs']);
    $Straatnaam1 = strip_tags($_POST['betalingswijze']);
    $Huisnummer1 = strip_tags($_POST['betalingsinstructie']);
    $Straatnaam2 = strip_tags($_POST['verzendinstructie']);
    $Huisnummer2 = strip_tags($_POST['verzendinstructie']);

    $sql = "UPDATE Gebruiker SET Titel = '$Titel', Beschrijving = '$Beschrijving', Startprijs = '$Startprijs', Verkoopprijs = '$Verkoopprijs',
            Betalingswijze = '$Betalingswijze', Betalingsinstructie = '$Betalingsinstructie', Verzendinstructies = '$Verzendinstructie'
            WHERE Voorwerpnummer = '$voorwerp'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
ob_end_clean();
header("Location: mijnprofiel.php");
