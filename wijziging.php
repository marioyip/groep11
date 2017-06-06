<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 2-6-2017
 * Time: 14:41
 */
require_once 'includes/functies.php';
connectToDatabase();

if (isset($_POST['submit'])) {
    echo 'henkjan in het if statement';
    $voorwerp = $_POST['voorwerp'];

    $Titel = strip_tags($_POST['titel']);
    $Beschrijving = strip_tags($_POST['beschrijving']);
    $Startprijs = strip_tags($_POST['startprijs']);
    $Verkoopprijs = strip_tags($_POST['verkoopprijs']);
    $Betalingswijze = strip_tags($_POST['betalingswijze']);
    $Betalingsinstructie = strip_tags($_POST['betalingsinstructie']);
    $Verzendinstructie = strip_tags($_POST['verzendinstructie']);

    $sql = "UPDATE Voorwerp SET Titel = '$Titel', Beschrijving = '$Beschrijving', Startprijs = '$Startprijs', Verkoopprijs = '$Verkoopprijs',
            Betalingswijze = '$Betalingswijze', Betalingsinstructie = '$Betalingsinstructie', Verzendinstructies = '$Verzendinstructie'
            WHERE Voorwerpnummer = '$voorwerp'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
ob_end_clean();
header("Location: mijnprofiel.php");
