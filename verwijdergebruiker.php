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
    echo $gebruiker;

    $sql = "SELECT TOP 1 email FROM Gebruiker WHERE Gebruikersnaam = '$gebruiker'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_NUM)){
        $email = $row[0];
    }
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From: EenmaalAndermaal Veiling <EenmaalAndermaal@iConcepts.nl>' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $onderwerp = 'Verwijdering account EenmaalAndermaal' . "\r\n";
    $bericht = 'Uw account van EenmaalAndermaal is per direct opgezegd. Denkt u dat is een fout is, neem dan contact op via onze contact pagina.';
    mail($email, $onderwerp, $bericht, $headers);

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