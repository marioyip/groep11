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
</head>
<body>

<?php

include 'header.php';
include 'catbar.php';

if(isset($_POST['submit'])) {
    $foutmelding = '';

    $gelukt = "gelukt";
    $voornaam = $_POST['voornaam'];
    $emailadress = $_POST['emailadress'];
    $achternaam = $_POST['achternaam'];
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];
    $geboortedatum = $_POST['geboortedatum'];
    $vraag = $_POST['vraag'];
    $antwoord = $_POST['antwoord'];
    $straat = $_POST['straat'];
    $huisnr = $_POST['huisnr'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $land = $_POST['land'];
    $verkoper = $_POST['verkoper'];

    if (empty($voornaam)) {
        $foutmelding = 'wel je voornaam invullen!';
    } if (empty($emailadress)) {
        $foutmelding = 'wel je emailadres invullen!';
    } if (empty($achternaam)) {
        $foutmelding = 'wel je achternaam invullen!';
    } if (empty($gebruikersnaam)) {
        $foutmelding = 'wel je gebruikeresnaam invullen!';
    } if (empty($wachtwoord)) {
        $foutmelding = 'wel je wachtwoord invullen!';
    } if (empty($geboortedatum)) {
        $foutmelding = 'wel je geboortedatum invullen!';
    } if (empty($vraag)) {
        $foutmelding = 'wel je geheime vraag kiezen invullen!';
    } if (empty($antwoord)) {
        $foutmelding = 'wel je supergeheime antwoord invullen invullen!';
    } if (empty($straat)) {
        $foutmelding = 'wel je straat invullen!';
    } if (empty($huisnr)) {
        $foutmelding = 'wel je huisnummer invullen!';
    } if (empty($postcode)) {
        $foutmelding = 'wel je postcode invullen!';
    } if (empty($plaats)) {
        $foutmelding = 'wel je plaatsnaam invullen!';
    } if (empty($land)) {
        $foutmelding = 'wel je land invullen!';
    } if (empty($verkoper)) {
        $foutmelding = 'wel aangeven of je een verkoper bent invullen!';
    }

    if($foutmelding==''){
        echo 'joepie';
    }
    else{ echo '<div class="alert alert-danger"><strong>Fout!</strong> '.$foutmelding.'</div>';
    }
}

?>
<main>
    <div class="container marginTop20">
        <div class="col-md-12" align="center">
            <h1>Maak jouw account aan!</h1>
        </div>

        <div class="col-md-12 marginTop20" align="center">
            <div class="col-md-2 marginTop20" align="center">

            </div>
            <div class="col-md-9 marginTop20 text-left">
                <form class="form-horizontal" method="post" action="registreren.php">
                    <div class="form-group">
                        <h3>Accountgegevens</h3>
                        <label class="control-label col-sm-2 text-left" for="email">Voornaam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="voornaam" id="email"
                                   placeholder="Kees">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Achternaam:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="achternaam" id="pwd"
                                   placeholder="van Dalen">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">E-mailadres:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control marginLeft200" name="emailadress" id="email"
                                   placeholder="k.vandalen@email.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Gebruikersnaam:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="gebruikersnaam" id="pwd"
                                   placeholder="keesvdalen">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Wachtwoord:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control marginLeft200" name="wachtwoord" id="email"
                                   placeholder="Voer een wachtwoord in">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Herhaal wachtwoord:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control marginLeft200" name="wachtwoord2" id="pwd"
                                   placeholder="Herhaal uw het wachtwoord">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Geboortedatum:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control marginLeft200" name="geboortedatum" id="email"
                                   placeholder="YYYY-MM-DD">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="control-label col-sm-2" for="pwd">Beveiligingsvraag:
                                <select name="vraag" class="marginLeft400">
                                    <option value="huisdier">Wat is mijn favoriete huisdier?</option>
                                    <option value="geboorteplaats">Wat is mijn geboorteplaats?</option>
                                    <option value="jeugdvriend">Wie is mijn jeugdvriend?</option>
                                    <option value="moeder">Wat is de meisjesnaam van mijn moeder?</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 " for="pwd">Antwoord:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="antwoord" id="pwd"
                                   placeholder="Je antwoord">
                        </div>
                    </div>

                    <h3>Adresgegevens</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Straat:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="straat" id="pwd"
                                   placeholder="Janstraat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Huisnummer:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control marginLeft200" name="huisnr" id="pwd"
                                   placeholder="4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Postcode:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="postcode" id="pwd"
                                   placeholder="1234 AB">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Plaatsnaam:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="plaats" id="pwd"
                                   placeholder="Ede">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Land:</label>
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
                            <input type="text" class="form-control marginLeft200" name="rekeningnr" id="pwd"
                                   placeholder="NL 53 BANK 1234567890">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Rekeninghouder:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="rekeninghouder" id="email"
                                   placeholder="John Doe">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Bent u een verkoper?</label>
                        <div class="col-sm-10">
                            <select name="verkoper" class="marginLeft400">
                                <option value="ja">Ja</option>
                                <option value="nee">Nee</option>
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
            <div class="col-md-2 marginTop20" align="center">

            </div>
        </div>
    </div>
</main>

<?php

?>





<!--        <div class="containerMain">-->
<!--            <div class="container-fluid">-->
<!--                <section class="container">-->
<!--                    <div class="container-page">-->
<!--                        <div class="col-md-6">-->
<!--                            <h3 class="dark-grey">Registration</h3>-->
<!---->
<!--                            <div class="form-group col-lg-12">-->
<!--                                <label>Username</label>-->
<!--                                <input type="" name="" class="form-control" id="" value="">-->
<!--                            </div>-->
<!---->
<!--                            <div class="form-group col-lg-6">-->
<!--                                <label>Password</label>-->
<!--                                <input type="password" name="" class="form-control" id="" value="">-->
<!--                            </div>-->
<!---->
<!--                            <div class="form-group col-lg-6">-->
<!--                                <label>Repeat Password</label>-->
<!--                                <input type="password" name="" class="form-control" id="" value="">-->
<!--                            </div>-->
<!---->
<!--                            <div class="form-group col-lg-6">-->
<!--                                <label>Email Address</label>-->
<!--                                <input type="" name="" class="form-control" id="" value="">-->
<!--                            </div>-->
<!---->
<!--                            <div class="form-group col-lg-6">-->
<!--                                <label>Repeat Email Address</label>-->
<!--                                <input type="" name="" class="form-control" id="" value="">-->
<!--                            </div>-->
<!---->
<!--                            <div class="col-sm-6">-->
<!--                                <input type="checkbox" class="checkbox" />Sigh up for our newsletter-->
<!--                            </div>-->
<!---->
<!--                            <div class="col-sm-6">-->
<!--                                <input type="checkbox" class="checkbox" />Send notifications to this email-->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-6">-->
<!--                            <h3 class="dark-grey">Terms and Conditions</h3>-->
<!--                            <p>-->
<!--                                By clicking on "Register" you agree to The Company's' Terms and Conditions-->
<!--                            </p>-->
<!--                            <p>-->
<!--                                While rare, prices are subject to change based on exchange rate fluctuations --->
<!--                                should such a fluctuation happen, we may request an additional payment. You have the option to request a full refund or to pay the new price. (Paragraph 13.5.8)-->
<!--                            </p>-->
<!--                            <p>-->
<!--                                Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)-->
<!--                            </p>-->
<!--                            <p>-->
<!--                                Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)-->
<!--                            </p>-->
<!---->
<!--                            <button type="submit" class="btn btn-default">Registereren</button>-->
<!--<!--                        </div>-->
<!--</div>-->
<!--</section>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
</body>

</html>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


<?php
include 'footer.php'
?>