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
include ('includes/header.php');

//if (isset($_SESSION['username'])) {
//    header("Location: index.php");
//}
//
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
    $ingevoerdecode = $_POST['ingevoerdecode'];
    $emailingevoerd = $_POST['emailingevoerd'];
    $gemaaktecode = $_POST['gemaaktecode'];
    $emailbevestigd = $_POST['emailbevestigd'];


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
        VALUES ('$achternaam', '$straat', '$huisnr', '$antwoord', '$geboortedatum', '$emailbevestigd', '$gebruikersnaam',
                '$land', '$plaats', '$postcode', '$voornaam', '$vraag', '$hashedWachtwoord', '$verkoper')";
        } else {
            $sql = "INSERT INTO Gebruiker (Achternaam, Straatnaam1, Huisnummer1, Straatnaam2, Huisnummer2, Antwoordtekst,
                GeboorteDag, email, Gebruikersnaam, Land, Plaatsnaam, Postcode, Voornaam, Vraag, Wachtwoord, Verkoper)
        VALUES ('$achternaam', '$straat', '$huisnr', '$straat2', '$huisnr2' , '$antwoord', '$geboortedatum', '$emailbevestigd', '$gebruikersnaam',
            '$land', '$plaats', '$postcode', '$voornaam', '$vraag', '$hashedWachtwoord', '$verkoper')";
        }

        $stmt = $db->prepare($sql);
        $stmt->execute();

    }


    if ($ingevoerdecode == $gemaaktecode && $emailbevestigd == $emailingevoerd) {
        $voornaam = $_POST['voornaambevestigd'];
        $achternaam = $_POST['achternaambevestigd'];
        $emailingevoerd = $_POST['emailingevoerd'];
        $emailbevestigd = $_POST['emailbevestigd'];
        $gemaaktecode = $_POST['gemaaktecode'];
        $ingevoerdecode = $_POST['ingevoerdecode'];
    }

}
    ?>

    <div class="form-control">
        <!-- action moet op deze pagina zijn -->
        <form acion="" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd"> Gebruikersnaam:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control marginLeft200" name="gebruikersnaam"
                           id="gebruikersnaam"
                           placeholder="keesvdalen">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email"> Wachtwoord:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control marginLeft200" name="wachtwoord" id="wachtwoord"
                           placeholder="Voer een wachtwoord in">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd"> Herhaal wachtwoord:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control marginLeft200" name="wachtwoord2" id="pwd"
                           placeholder="Herhaal uw het wachtwoord">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email"> Geboortedatum:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control marginLeft200" name="geboortedatum" id="email"
                           placeholder="YYYY-MM-DD">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                    <label class="control-label col-sm-2" for="pwd"> Beveiligingsvraag:
                        <select name="vraag" class="marginLeft400">
                            <option value="1"> Wat is mijn favoriete huisdier ?</option>
                            <option value="2"> Wat is mijn geboorteplaats ?</option>
                            <option value="3"> Wie is mijn jeugdvriend ?</option>
                            <option value="4"> Wat is de meisjesnaam van mijn moeder ?</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 " for="pwd"> Antwoord:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control marginLeft200" name="antwoord" id="pwd"
                           placeholder="Je antwoord">
                </div>
            </div>

            <h3> Adresgegevens</h3>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd"> Straat:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control marginLeft200" name="straat" id="pwd"
                           placeholder="Janstraat">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd"> Huisnummer:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control marginLeft200" name="huisnr" id="pwd"
                           placeholder="4">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd"> Tweede straat(optioneel):</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control marginLeft200" name="straat2" id="pwd"
                           placeholder="Janstraat">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd"> Tweede huisnummer(optioneel):</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control marginLeft200" name="huisnr2" id="pwd"
                           placeholder="5">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd"> Postcode:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control marginLeft200" name="postcode" id="pwd"
                           placeholder="1234 AB">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd"> Plaatsnaam:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control marginLeft200" name="plaats" id="pwd"
                           placeholder="Ede">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="email"> Land:</label>
                <div class="col-sm-10">
                    <select name="land" class="marginLeft400">
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
            </div>

            <h3>Betalingsgegevens</h3>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Rekeningnummer(IBAN):</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control marginLeft200" name="rekeningnummer" id="pwd"
                           placeholder="NL 53 BANK 1234567890">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Rekeninghouder:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control marginLeft200" name="rekeninghouder" id="email"
                           placeholder="Anja Houtwipper">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Bent u een verkoper?</label>
                <div class="col-sm-10">
                    <select name="verkoper" class="marginLeft400">
                        <option value="wel">Ja</option>
                        <option value="niet">Nee</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="submit">Verzenden</button>
                </div>
            </div>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <?php ;
    include ('includes/footer.php');


?>

</body>
</html>
