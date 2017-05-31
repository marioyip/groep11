<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registreren - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
</head>
<body>

<?php
session_start();
include('includes/header.php');


if(isset($_POST['ingevoerdecode'])){
    $_SESSION['ingevoerdecode'] = $_POST['ingevoerdecode'];
    $_SESSION['email']= $_POST['emailingevoerd'];
}
else{
    $email=$_SESSION['email'];
    $ingevoerdecode = $_SESSION['ingevoerdecode'];
}

if (isset($_POST['submit'])) {
//alle benodigde informatie om te kunnen registreren
    $geentweedehuis = false;
    $foutmelding = '';
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];
    $wachtwoord2 = $_POST['wachtwoord2'];
    $geboortedatum = $_POST['geboortedatum'];
    $vraag = $_POST['vraag'];
    $antwoord = $_POST['antwoord'];
    $straat = $_POST['straat'];
    $huisnr = $_POST['huisnr'];
    $straat2 = $_POST['straat2'];
    $huisnr2 = $_POST['huisnr2'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $land = $_POST['land'];
    $verkoper = $_POST['verkoper'];
    $rekeningnummer = $_POST['rekeningnummer'];
    $rekeninghouder = $_POST['rekeninghouder'];
    $voornaam = $_SESSION['voornaam'];
    $achternaam = $_SESSION['achternaam'];


    if (empty($gebruikersnaam)) {
        $foutmelding = 'wel je gebruikeresnaam invullen!';
    }
    if (empty($wachtwoord)
        || strlen($wachtwoord) < 6
        || strpbrk($wachtwoord, '1234567890') == FALSE
        || strpbrk($wachtwoord, 'abcdefghijklmnopqrstuvwxyz') == FALSE
        || strpbrk($wachtwoord, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ') == FALSE
    ) {

        $foutmelding = 'weet je zeker dat je wachtwoord langer is dan 6 karakters, een cijfer, een hoofdletter en teminste één kleine letter bevat?';
    }
    if (empty($geboortedatum)) {
        $foutmelding = 'wel je geboortedatum invullen!';
    }
    if (empty($antwoord)) {
        $foutmelding = 'wel je supergeheime antwoord invullen invullen!';
    }
    if (empty($straat)) {
        $foutmelding = 'wel je straat invullen!';
    }
    if (empty($huisnr)) {
        $foutmelding = 'wel je huisnummer invullen!';
    }
    if (empty($postcode)) {
        $foutmelding = 'wel je postcode invullen!';
    }
    if (empty($plaats)) {
        $foutmelding = 'wel je plaatsnaam invullen!';
    }
    if (empty($land)) {
        $foutmelding = 'wel je land invullen!';
    }
    if ($wachtwoord != $wachtwoord2) {
        $foutmelding = 'de wachtwoorden zijn niet hetzelfde';
    }
    if (empty($rekeningnummer)) {
        $foutmelding = 'Je hebt geen rekeningnummer ingevuld!';
    }
    if (empty($rekeninghouder)) {
        $foutmelding = 'Op welke naam staat uw rekening?';
    }
    if (empty($huisnr2) && empty($straat2)) {
        $geentweedehuis = true;
    }

    if (empty($huisnr2) && empty($straat2) == FALSE || empty($straat2) && empty($huisnr2) == FALSE) {
        $foutmelding = "Check je optionele tweede adresgegevens!";
    }

    if ($foutmelding == '') {

        ini_set('display_errors', 'On');

        require_once('includes/functies.php');

        if ($verkoper == 'wel') {
            $verkoper = 1;
        } else {
            $verkoper = 0;
        }

        $geboortedatum = date("Y-m-d", strtotime($geboortedatum));

        connectToDatabase();

        $hashedWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT); //het meegegeven wachtwoord wordt gehashed


        if ($geentweedehuis == true) {
            $sql = "INSERT INTO Gebruiker (Achternaam, Straatnaam1, Huisnummer1, Antwoordtekst,
        GeboorteDag, email, Gebruikersnaam, Land, Plaatsnaam, Postcode, Voornaam, Vraag, Wachtwoord, Verkoper)
        VALUES ('$achternaam', '$straat', '$huisnr', '$antwoord', '$geboortedatum', '$email', '$gebruikersnaam',
                '$land', '$plaats', '$postcode', '$voornaam', '$vraag', '$hashedWachtwoord', '$verkoper')";
        } else {
            $sql = "INSERT INTO Gebruiker (Achternaam, Straatnaam1, Huisnummer1, Straatnaam2, Huisnummer2, Antwoordtekst,
                GeboorteDag, email, Gebruikersnaam, Land, Plaatsnaam, Postcode, Voornaam, Vraag, Wachtwoord, Verkoper)
        VALUES ('$achternaam', '$straat', '$huisnr', '$straat2', '$huisnr2' , '$antwoord', '$geboortedatum', '$email', '$gebruikersnaam',
            '$land', '$plaats', '$postcode', '$voornaam', '$vraag', '$hashedWachtwoord', '$verkoper')";
        }

        $stmt = $db->prepare($sql);
        $stmt->execute();

        die();
        header("Location: inloggen.php");
    }
}


//if ($_SESSION['ingevoerdecode'] == $_SESSION['code'] && $_SESSION['emailadres'] == $_SESSION['email']) {
 ?>

<div class="marginTop50" >
    <form class="form-horizontal" action="" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-2" for="gebruikersnaam">Gebruikersnaam:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="gebruikersnaam" placeholder="HarryKetsers">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="wachtwoord">Wachtwoord:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="wachtwoord" placeholder="Wachtwoord">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="wachtwoord2">Herhaal wachtwoord:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="wachtwoord2" placeholder="Herhaal wachtwoord">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="geboortdedatum">Geboortedatum:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="geboortdedatum" placeholder="JJJJ-MM-DD">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2 marginright25" for="vraag"> Beveiligingsvraag:</label>
                <select name="vraag" id="vraag" class=" form-control1">
                    <?php
                    $sql = "SELECT TekstVraag, Vraagnummer FROM Vraag";
                    $stmt = $db->prepare($sql); //Statement object aanmaken
                    $stmt->execute();           //Statement uitvoeren
                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelrij uitgelezen
                    {
                        $vragen[] = $row[0];
                        $nummers[] = $row[1];
                    }

                    for ($i = 0; $i < count($vragen); $i++) {
                        echo '<option value="' . $nummers[$i] . '"> ' . $vragen[$i] . ' </option)>';
                    }
                    ?>
                </select>
            </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="antwoord">Antwoord:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="antwoord" placeholder="Jou Antwoord">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="straat">Straatnaam:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="straat" placeholder="Herengracht">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="huisnr">Huisnummer:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="huisnr" placeholder="33">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="straat2">*Tweede Straatnaam:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="straat2" placeholder="Dorpsstraat">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="huisnr2">*Tweede Huisnummer:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="huisnr2" placeholder="56">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="postcode">Postcode:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="postcode" placeholder="1234AB">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2 marginright25" for="land">Land:</label>
                <select name="land" id="land" class=" form-control1">
                    <?php
                    $sql = "SELECT Landnaam FROM Landen";
                    $stmt = $db->prepare($sql); //Statement object aanmaken
                    $stmt->execute();           //Statement uitvoeren
                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelrij uitgelezen
                    {
                        for ($i = 0; $i < count($row); $i++) {
                            echo '<option value="' . $row[$i] . '"> ' . $row[$i] . ' </option)>';
                        }
                    }
                    ?>
                </select>
            </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="rekeningnummer">Rekeningnummer(IBAN):</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="rekeningnummer" placeholder="NL 53 BANK 1234567890">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="rekeninghouder">Rekeninghouder:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="rekeninghouder" placeholder="Jan Steen">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-2">
                <button type="submit" class="btn btn-default" name="submit">Verzenden</button>
            </div>
        </div>
    </form>
</div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

<!--    --><?php
//}
//else{
//    header("Location: registreren.php");
//}


include('includes/footer.php');


?>

</body>
</html>
