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
?>
<main>

    <div class="container marginTop20">
        <div class="col-md-12" align="center">
            <h1>Registreren</h1>
        </div>

        <div class="col-md-12 marginTop20" align="center">
            <div class="col-md-2 marginTop20" align="center">

            </div>
            <div class="col-md-9 marginTop20 text-left">
                <form class="form-horizontal" method="post" action="registratiegelukt.php">
                    <div class="form-group">
                        <h3>Accountgegevens</h3>
                        <label class="control-label col-sm-2 text-left" for="email">Voornaam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="voornaam" id="email" placeholder="Kees">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Achternaam:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="achternaam" id="pwd" placeholder="van Dalen">
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
                        <label class="control-label col-sm-2" for="pwd">Gebruiekrsnaam:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="gebruikersnaam" id="pwd" placeholder="keesvdalen">
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
                            <input type="date" class="form-control marginLeft200" name="geboortedatum" id="email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Telefoon<br>nummer:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control marginLeft200" name="telefoon" id="pwd" placeholder="1234567890">
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
                            <input type="text" class="form-control marginLeft200" name="antwoord" id="pwd" placeholder="Je antwoord">
                        </div>
                    </div>

                    <h3>Adresgegevens</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Straat:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="straat" id="pwd" placeholder="Janstraat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Huisnummer:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control marginLeft200" name="huisnr" id="pwd" placeholder="4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Postcode:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="postcode" id="pwd" placeholder="1234 AB">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Plaatsnaam:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="plaats" id="pwd" placeholder="Ede">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Land:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="land" id="email" placeholder="België">
                        </div>
                    </div>

                    <h3>Betalingsgegevens</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Rekeningnummer (IBAN):</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="rekeningnr" id="pwd"
                                   placeholder="NL 53 BANK 1234567890">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Rekeninghouder:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="rekeninghouder" id="email" placeholder="John Doe">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Bent u een verkoper?</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="verkoper" id="pwd" placeholder="ja/nee">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2 marginTop20" align="center">

            </div>

        </div>
    </div>
</body>

</html>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


