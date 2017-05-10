<?php
session_start();
require_once("functies.php");
connectToDatabase();

$html = "";
$errors = "";
$voornaam = isset($_POST['voornaam']) ? $_POST['voornaam'] : "";
$achternaam = isset($_POST['achternaam']) ? $_POST['achternaam'] : "";
$geboortedatum = isset($_POST['geboortedatum']) ? $_POST['geboortedatum'] : "";
$username = isset($_POST['username']) ? $_POST['username'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$herhaalWachtwoord = isset($_POST['herhaalWachtwoord']) ? $_POST['herhaalWachtwoord'] : "";
$rekeningnummer = isset($_POST['rekeningnummer']) ? $_POST['rekeningnummer'] : "";
$creditcard = isset($_POST['creditcard']) ? $_POST['creditcard'] : "";
$veilinggesloten = isset($_GET['"Veilinggesloten?"']) ? $_GET['"Veilinggesloten?"'] : "";

if($veilinggesloten == 1) {
    $errors .= "gesloten";
}
if($veilinggesloten == 0) {
    $errors .= "geopend";
}


if (empty($rekeningnummer) OR empty($creditcard)) {
    $errors .= "Het rekeningnummer of de creditcard gegevens moeten ingevuld zijn.<br>";
}

//wachtwoord langer dan 6, 1 getal, minstens 1 letter

if (empty($voornaam)) {
    $errors .= "Voornaam moet ingevuld zijn.<br>";
}
if (empty($achternaam)) {
    $errors .= "Achternaam moet ingevuld zijn.<br>";
}

if (empty($geboortedatum)) {
    $errors .= "Je moet je geboortedatum opgeven.<br>";
}
if (empty($email)) {
    $errors .= "Het emailaddress ontbreekt.<br>";
}
if (empty($username)) {
    $errors .= "Je moet een gebruikersnaam invullen.<br>";
}
if (empty($password)) {
    $errors .= "Je moet een wachtwoord invullen.<br>";
}
if (empty($herhaalWachtwoord)) {
    $errors .= "Het wachtwoord moet nog een keer worden ingevuld ter bevestiging.<br>";
}
if ($herhaalWachtwoord != $password) {
    $errors .= "De wachtwoorden komen niet overeen.<br>";
}

if ($errors) {
    $_SESSION['postdata'] = $_POST;
    $_SESSION['errors'] = $errors;
    //header("Location: registratie.php");
}

$html = "";
$html .= "<p>Beste $voornaam $achternaam je bent aangemeld voor Eenmaal Andermaal.</p>";

include('header.php');
if ($errors) {
    echo $errors;
} else {
    echo $html;
    insertUserInDatabase($username, $password, $voornaam, $achternaam, $email, $geboortedatum);
    header("location: index.php");
}
include('footer.php');

//<label for="username">Gebruikersnaam</label><input type="text" name="username" id="username"
//                                                           placeholder="Username" value="<?=isset($postdata['username'])?$postdata['username']:""?>"/>