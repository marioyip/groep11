<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registratie afronden - Eenmaal Andermaal</title>
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
<main>
    <?php
    ob_start();
    session_start();
    include('includes/header.php');
    include('includes/catbar.php');
    require_once('includes/functies.php');
    connectToDatabase();
    $error = $errorPostcode = $errorHuis = $errorStraat = $errorAw = $errorWw = $errorWw2 = $errorGd = $errorUser = $errorTel = $errorPlaats = "";
    $gebruikersnaam = $ww = $ww2 = $gd = $tel = $vraag = $aw = $straat = $huisnr = $straat2 = $huisnr2 = $postcode = $plaats = $land = $voornaam = $achternaam = $bestaatNaam = "";
    ?>
    <div class="containerMinHeight">
        <div class="container">
            <div class="col-md-12">
                <h1 align="center" class="textGreen">Registratie afronden</h1>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="marginTop50">
                    <form class="form-horizontal" method="POST">
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2" for="gebruikersnaam">Gebruikersnaam:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="gebruikersnaam" id="gebruikersnaam"
                                       placeholder="JohnDoe"
                                       value="<?php echo isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : '' ?>">
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $gebruikersnaam = "";
                            $gebruikersnaam = strip_tags($_POST['gebruikersnaam']);
                            $sql = "SELECT Gebruikersnaam FROM Gebruiker WHERE Gebruikersnaam = '$gebruikersnaam'"; //De query maken
                            $stmt = $db->prepare($sql); //Statement object aanmaken
                            $stmt->execute();
                            $row = $stmt->fetch();

                            if (empty($gebruikersnaam)) {
                                $errorUser = 'U heeft uw gebruikersnaam niet ingevuld!';
                            } else if (!empty($row)) {
                                $errorUser = "Deze gebruikersnaam is al in gebruik!";
                            }
                            $error .= $errorUser;
                            if ($errorUser != "") {
                                echo isset($_POST['submit']) ? "<div class='alert alert-danger'> <p>" . $errorUser . "</p></div>" : "";
                            }
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2" for="wachtwoord">Wachtwoord:</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="wachtwoord" name="wachtwoord"
                                       placeholder="Wachtwoord">
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $ww = "";
                            $ww = strip_tags($_POST['wachtwoord']);
                            if (empty($ww)) {
                                $errorWw = 'U heeft uw wachtwoord niet ingevuld!';
                            }
                            if (!preg_match("/^[a-zA-Z0-9!?]*$/", $ww) && strlen($ww) > 6) {
                                $errorWw = "Uw wachtwoord moet minstens 6 karakters lang zijn, een hoofdletter, een kleine letter en een getal bevatten!";
                            }
                            $error .= $errorWw;
                            if ($errorWw != "") {
                                echo isset($_POST['submit']) ? "<div class='alert alert-danger'> <p>" . $errorWw . "</p></div>" : "";
                            }
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2" for="wachtwoord2">Herhaal wachtwoord:</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="wachtwoord2" name="wachtwoord2"
                                       placeholder="Herhaal wachtwoord">
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $ww2 = "";
                            $ww2 = strip_tags($_POST['wachtwoord2']);
                            if (empty($ww2)) {
                                $errorWw2 = 'U heeft uw wachtwoord niet opnieuw ingevuld!';
                            }
                            if (!empty($ww2) && $ww2 != $ww) {
                                $errorWw2 = "Uw wachtwoorden komen niet overeen!";
                            }
                            $error .= $errorWw2;
                            if ($errorWw2 != "") {
                                echo isset($_POST['submit']) ? "<div class='alert alert-danger'> <p>" . $errorWw2 . "</p></div>" : "";
                            }
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2" for="telefoonnummer">Telefoonnummer:</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="telefoonnummer" name="telefoonnummer"
                                       placeholder="1234567890"
                                       value="<?php echo isset($_POST['telefoonnummer']) ? $_POST['telefoonnummer'] : '' ?>">
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $tel = "";
                            $tel = strip_tags($_POST['telefoonnummer']);
                            if (empty($tel)) {
                                $errorTel = 'U heeft uw telefoonnummer niet ingevuld!';
                            }
                            $error .= $errorTel;
                            if ($errorTel != "") {
                                echo isset($_POST['submit']) ? "<div class='alert alert-danger'> <p>" . $errorTel . "</p></div>" : "";
                            }
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2" for="geboortdedatum">Geboortedatum:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="geboortdedatum" name="geboortedatum"
                                       placeholder="JJJJ-MM-DD"
                                       value="<?php echo isset($_POST['geboortedatum']) ? $_POST['geboortedatum'] : '' ?>">
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $gd = "";
                            $gd = strip_tags($_POST['geboortedatum']);
                            if (empty($gd)) {
                                $errorGd = 'U heeft uw geboortedatum niet ingevuld!';
                            }
                            $vandaag = date('Y-m-d');
                            $verjaardag = date('Y-m-d', strtotime($gd));
                            $leeftijd = $vandaag - $verjaardag;

                            if (!empty($gd) && $leeftijd <= 17) {
                                $errorGd = "Om te kunnen registreren voor Eenmaal Andermaal moet u 18 jaar of ouder zijn!";
                            }

                            $error .= $errorGd;
                            if ($errorGd != "") {
                                echo isset($_POST['submit']) ? "<div class='alert alert-danger'> <p>" . $errorGd . "</p></div>" : "";
                            }
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2 marginright25" for="vraag">
                                Beveiligingsvraag:</label>
                            <select name="vraag" id="vraag" class=" col-md-6 form-control1 width320">
                                <?php
                                $sql = "SELECT TekstVraag, Vraagnummer FROM Vraag";
                                $stmt = $db->prepare($sql); //Statement object aanmaken
                                $stmt->execute();           //Statement uitvoeren
                                $vragen = array();
                                $nummers = array();
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
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2" for="antwoord">Antwoord:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="antwoord" name="antwoord"
                                       placeholder="Je antwoord"
                                       value="<?php echo isset($_POST['antwoord']) ? $_POST['antwoord'] : '' ?>">
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $aw = "";
                            $aw = strip_tags($_POST['antwoord']);
                            if (empty($aw)) {
                                $errorAw = 'U heeft uw antwoord op de vraag niet ingevuld!';
                            }
                            $error .= $errorAw;
                            if ($errorAw != "") {
                                echo isset($_POST['submit']) ? "<div class='alert alert-danger'> <p>" . $errorAw . "</p></div>" : "";
                            }
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2" for="straat">Straatnaam:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="straat" name="straat"
                                       placeholder="Herengracht"
                                       value="<?php echo isset($_POST['straat']) ? $_POST['straat'] : '' ?>">
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $straat = "";
                            $straat = strip_tags($_POST['straat']);
                            if (empty($straat)) {
                                $errorStraat = 'U heeft uw straatnaam niet ingevuld!';
                            }
                            $error .= $errorStraat;
                            if ($errorStraat != "") {
                                echo isset($_POST['submit']) ? "<div class='alert alert-danger'> <p>" . $errorStraat . "</p></div>" : "";
                            }
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2" for="huisnr">Huisnummer:</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="huisnr" name="huisnr"
                                       placeholder="33"
                                       value="<?php echo isset($_POST['huisnr']) ? $_POST['huisnr'] : '' ?>">
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $huisnr = "";
                            $huisnr = strip_tags($_POST['huisnr']);
                            if (empty($huisnr)) {
                                $errorHuis = 'U heeft uw huisnummer niet ingevuld!';
                            }
                            $error .= $errorHuis;
                            if ($errorHuis != "") {
                                echo isset($_POST['submit']) ? "<div class='alert alert-danger'> <p>" . $errorHuis . "</p></div>" : "";
                            }
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2" for="straat2">*Tweede Straatnaam:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="straat2" name="straat2"
                                       placeholder="Dorpsstraat"
                                       value="<?php echo isset($_POST['straat2']) ? $_POST['straat2'] : '' ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2" for="huisnr2">*Tweede Huisnummer:</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="huisnr2" name="huisnr2"
                                       placeholder="56"
                                       value="<?php echo isset($_POST['huisnr2']) ? $_POST['huisnr2'] : '' ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2" for="postcode">Postcode:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="postcode" name="postcode"
                                       placeholder="1234AB"
                                       value="<?php echo isset($_POST['postcode']) ? $_POST['postcode'] : '' ?>">
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $postcode = "";
                            $postcode = strip_tags($_POST['postcode']);
                            if (empty($postcode)) {
                                $errorPostcode = 'U heeft uw postcode niet ingevuld!';
                            }
                            $error .= $errorPostcode;
                            if ($errorPostcode != "") {
                                echo isset($_POST['submit']) ? "<div class='alert alert-danger'> <p>" . $errorPostcode . "</p></div>" : "";
                            }
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2" for="plaats">Plaats:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="plaats" name="plaats"
                                       placeholder="Rotterdam"
                                       value="<?php echo isset($_POST['plaats']) ? $_POST['plaats'] : '' ?>">
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $plaats = "";
                            $plaats = strip_tags($_POST['plaats']);
                            if (empty($plaats)) {
                                $errorPlaats = 'U heeft uw plaatsnaam niet ingevuld!';
                            }
                            $error .= $errorPlaats;
                            if ($errorPlaats != "") {
                                echo isset($_POST['submit']) ? "<div class='alert alert-danger'> <p>" . $errorPlaats . "</p></div>" : "";
                            }
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label class="control-label col-sm-2 marginright25" for="land">Land:</label>
                            <select name="land" id="land" class=" col-sm-6 form-control1 width320">
                                <?php
                                $sql = "SELECT Landnaam FROM Landen";
                                $stmt = $db->prepare($sql); //Statement object aanmaken
                                $stmt->execute();           //Statement uitvoeren
                                while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelrij uitgelezen
                                {
                                    for ($j = 0; $j < count($row); $j++) {
                                        echo '<option value="' . $row[$j] . '"> ' . $row[$j] . ' </option)>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-offset-2 col-sm-2">
                                <button type="submit" class="btn btn-default" name="submit">Verzenden</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <?php
    if (isset($_POST['submit'])) {
        if (empty($_SESSION['voornaam']) || empty($_SESSION['achternaam']) || empty($_SESSION['email'])) {
            $error = "foute registratie";
        } else {
            $voornaam = $_SESSION['voornaam'];
            $achternaam = $_SESSION['achternaam'];
            $email = $_SESSION['email'];
            $land = strip_tags($_POST['land']);
            $vraag = strip_tags($_POST['vraag']);
            $huisnr2 = strip_tags($_POST['huisnr2']);
            $straat2 = strip_tags($_POST['straat2']);

//        echo "voornaam :" .$voornaam. "<br>";
//        echo "achternaam :" .$achternaam. "<br>";
//        echo "email :" .$email. "<br>";
//        echo "land :" .$land. "<br>";
//        echo "vraag :" .$vraag. "<br>";
//        echo "gebruikersnaam :" .$gebruikersnaam. "<br>";
//        echo "ww :" .$ww. "<br>";
//        echo "ww2 :" .$ww2. "<br>";
//        echo "tel :" .$tel. "<br>";
//        echo "aw :" .$aw. "<br>";
//        echo "straat :" .$straat. "<br>";
//        echo "huisnr :" .$huisnr. "<br>";
//        echo "postcode :" .$postcode. "<br>";
//        echo "plaats :" .$plaats. "<br>";
//        echo "gd :" .$gd. "<br>";

            if (!empty($_POST['huisnr2']) && !empty($_POST['straat2'])) {
                $tweedeAdres = true;
            } else {
                $tweedeAdres = false;
            }

            if (empty($error)) {
                $gd = date("Y-m-d", strtotime($gd));

                $hashedWachtwoord = password_hash($ww, PASSWORD_DEFAULT); //het meegegeven wachtwoord wordt gehashed
                if ($tweedeAdres == false) {
                    $sql = "INSERT INTO Gebruiker (Achternaam, Straatnaam1, Huisnummer1, Antwoordtekst,
        GeboorteDag, email, Gebruikersnaam, Land, Plaatsnaam, Postcode, Voornaam, Vraag, Wachtwoord, Verkoper)
        VALUES ('$achternaam', '$straat', '$huisnr', '$aw', '$gd', '$email', '$gebruikersnaam',
                '$land', '$plaats', '$postcode', '$voornaam', '$vraag', '$hashedWachtwoord', '0');INSERT INTO Gebruikerstelefoon (Gebruiker, Telefoon)
                VALUES ('$gebruikersnaam', '$tel')";
                } else if ($tweedeAdres == true) {
                    $sql = "INSERT INTO Gebruiker (Achternaam, Straatnaam1, Huisnummer1, Straatnaam2, Huisnummer2, Antwoordtekst,
                GeboorteDag, email, Gebruikersnaam, Land, Plaatsnaam, Postcode, Voornaam, Vraag, Wachtwoord, Verkoper)
        VALUES ('$achternaam', '$straat', '$huisnr', '$straat2', '$huisnr2' , '$aw', '$gd', '$email', '$gebruikersnaam',
            '$land', '$plaats', '$postcode', '$voornaam', '$vraag', '$hashedWachtwoord', '0');INSERT INTO Gebruikerstelefoon (Gebruiker, Telefoon)
                VALUES ('$gebruikersnaam', '$tel')";
                }
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $_SESSION['nieuweGebruiker'] = $gebruikersnaam;
                ob_end_clean();
                header("Location: inloggen.php");
            }
        }
    }
    include('includes/footer.php');
    ob_end_flush();
    ?>
</main>
</body>
</html>
