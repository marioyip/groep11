<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once('functies.php');

connectToDatabase();


ini_set('display_errors', 1);
global $pdo;

//controle of alles is ingevuld


//
//if (isset($_POST['submit'])&&$_POST['wachtwoord']==$_POST['wachtwoord2']&&$_POST['wachtwoord']!='') {
//    $gelukt = "gelukt";
//    $voornaam = $_POST['voornaam'];
//    $emailadres = $_POST['emailadres'];
//    $achternaam = $_POST['achternaam'];
//    $gebruikersnaam = $_POST['gebruikersnaam'];
//    $wachtwoord = $_POST['wachtwoord'];
//    $geboortedatum = $_POST['geboortedatum'];
//    $vraag = $_POST['vraag'];
//    $antwoord = $_POST['antwoord'];
//    $straat = $_POST['straat'];
//    $huisnr = $_POST['huisnr'];
//    $postcode = $_POST['postcode'];
//    $plaats = $_POST['plaats'];
//    $land = $_POST['land'];
//    $verkoper = $_POST['verkoper'];



    registerUser("$voornaam", "$achternaam", "$emailadres", "$gebruikersnaam", "$wachtwoord",
        "$geboortedatum", "$vraag", "$antwoord", "$straat", "$huisnr", "$postcode",
        "$plaats", "$land", "$verkoper");

?>