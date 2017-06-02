<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 31-5-2017
 * Time: 15:29
 */
session_start();
require_once 'includes/functies.php';
connectToDatabase();

if (isset($_POST['gebruiker'])) {
    $gebruiker = $_POST['gebruiker'];
    $sql = "DELETE FROM VoorwerpInRubriek WHERE Voorwerp IN (SELECT Voorwerpnummer FROM Voorwerp WHERE Verkoper = '$gebruiker');
            DELETE FROM Bestand WHERE voorwerp IN (SELECT Voorwerpnummer FROM Voorwerp WHERE Verkoper = '$gebruiker');
            DELETE FROM Bod WHERE Voorwerp IN (SELECT Voorwerpnummer FROM Voorwerp WHERE Verkoper = '$gebruiker');
            DELETE FROM Voorwerp WHERE Verkoper = '$gebruiker';
            DELETE FROM Verkoper WHERE Gebruiker = '$gebruiker';
            DELETE FROM Bod WHERE Gebruiker = '$gebruiker';
            DELETE FROM Gebruiker WHERE Gebruikersnaam = '$gebruiker';";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}



header('Location: adminpanel.php');

?>

<div class="alert alert-success">
    <strong>Geselecteerde gebruiker is verwijderd.</strong>
</div>
