<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mijn profiel - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php
session_start();
if (empty($_SESSION['username'])) {
    header("Location: index.php");
}
include 'includes/header.php'; // Geeft de header mee aan de index.php pagina
include 'includes/catbar.php'; // Geeft de catbar.php mee aan de index pagina
?>


<main>
    <div class="containerMinHeight">
        <div class="container">
            <?php
            //  het ophalen van de informatie voor op het tabblad "Account"
            connectToDatabase();
            $gebruikersnaam = $_SESSION['username'];
            $query = "SELECT TOP 1 Gebruikersnaam, Voornaam, Achternaam, GeboorteDag, email,
                Straatnaam1, Huisnummer1, Straatnaam2, Huisnummer2 FROM Gebruiker WHERE Gebruikersnaam = '$gebruikersnaam' ";
            $stmt = $db->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                $Gebruikersnaam = $row[0];
                $Voornaam = $row[1];
                $Achternaam = $row[2];
                $GeboorteDag = $row[3];
                $Mailbox = $row[4];
                $Straatnaam1 = $row[5];
                $Huisnummer1 = $row[6];
                $Straatnaam2 = $row[7];
                $Huisnummer2 = $row[8];
            }
            ?>
            <!--    Het maken van de algemene inhoud" -->
            <div class="container-fluid">
                <div class="page-header" align="center">
                    <h1 class="textGreen">Mijn profiel</h1>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <img width="100px" height="100px" src="media/usericoon.png" alt=""
                         class="img-circle img-responsive"/>
                </div>
                <div class="col-md-2">
                    <h4>Welkom <?php echo $Voornaam; ?>!</h4>
                    <p class="glyphicon glyphicon-user"></p> <?php echo $Gebruikersnaam; ?></p>
                    <p class="glyphicon glyphicon-ice-lolly-tasted"></p> <?php echo $GeboorteDag; ?></p>
                </div>
            </div>
        </div>
        <!--    het maken van de tabbladen zelf -->
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#item1" role="tab">Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#item2" role="tab">Wachtwoord wijzigen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#item3" role="tab">Lopende veilingen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#item4" role="tab">Biedgeschiedenis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#item6" role="tab">Gewonnen veilingen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#item7" role="tab">Telefoonnummer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#item8" role="tab">Uitloggen</a>
                </li>
            </ul>
            <!-- Het maken van de inhoud van "account"-->
            <div class="tab-content">
                <div class="tab-pane active" id="item1" role="tabpanel">
                    <div class=" col-md-4">
                    </div>
                    <div class="col-md-2 marginTop5 text-right">

                        <h5><b>Gebruikersnaam</b></h5>
                        <h5><b>Naam</b></h5>
                        <h5><b>Geboortedatum</b></h5>
                        <h5><b>Primair adres</b></h5>
                        <h5><b>Secondair adres</b></h5>
                        <h5><b>Email</b></h5>
                    </div>
                    <div class="col-md-3 marginTop5">
                        <h5>- <?php echo $Gebruikersnaam; ?></h5>
                        <h5>- <?php echo $Voornaam . ' ' . $Achternaam; ?></h5>
                        <h5>- <?php echo $GeboorteDag; ?></h5>
                        <h5>- <?php echo $Straatnaam1 . ' ' . $Huisnummer1; ?></h5>
                        <h5>- <?php echo $Straatnaam2 . ' ' . $Huisnummer2 ?></h5>
                        <h5>- <?php echo $Mailbox ?></h5>
                    </div>
                </div>
                <!-- Wachtwoord wijzigen -->
                <div class="tab-pane fade " id="item2" role="tabpanel">
                    <div class="col-md-6 marginTop20">
                        <form action="" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>
                                    </div>
                                    <input class="form-control" type="password" placeholder="Huidig wachtwoord"
                                           name="huidigWachtwoord">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span>
                                    </div>
                                    <input class="form-control" type="password" placeholder="Nieuw wachtwoord"
                                           name="nieuwWachtwoord1">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span>
                                    </div>
                                    <input class="form-control" type="password" placeholder="Herhaal nieuw wachtwoord"
                                           name="nieuwWachtwoord2">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-default form-control" value="Opslaan">
                            </div>
                        </form>
                    </div>

                    <?php
                    //PHP gedoe van het wachtwoord wijzigen
                    if (isset($_POST['huidigWachtwoord']) && isset($_POST['nieuwWachtwoord1']) && isset($_POST['nieuwWachtwoord2']) && $_POST['huidigWachtwoord'] != '') {
                        $huidigWachtwoord = $_POST['huidigWachtwoord'];
                        $nieuwWachtwoord1 = $_POST['nieuwWachtwoord1'];
                        $nieuwWachtwoord2 = $_POST['nieuwWachtwoord2'];


                        $sql = "SELECT Wachtwoord FROM Gebruiker WHERE Gebruikersnaam = '$Gebruikersnaam'"; //De query maken
                        $stmt = $db->prepare($sql); //Statement object aanmaken
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            $controleWachtwoord = $row[0];

                            if ($nieuwWachtwoord1 != $nieuwWachtwoord2 || password_verify($huidigWachtwoord, $controleWachtwoord) == 0) {
                                header("Location: mijnprofiel.php#item2");
                            } else {
                                if (strlen($nieuwWachtwoord1) < 6
                                    || strpbrk($nieuwWachtwoord1, '1234567890') == FALSE
                                    || strpbrk($nieuwWachtwoord1, 'abcdefghijklmnopqrstuvwxyz') == FALSE
                                    || strpbrk($nieuwWachtwoord1, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ') == FALSE
                                ) {
                                    echo('weet je zeker dat je wachtwoord langer is dan 6 karakters, een cijfer, een hoofdletter en teminste één kleine letter bevat?');
                                } else {
                                    $hashedWachtwoord = password_hash($nieuwWachtwoord1, PASSWORD_DEFAULT); //het meegegeven wachtwoord wordt gehashed

                                    $sql = "UPDATE Gebruiker SET Wachtwoord = '$hashedWachtwoord' WHERE Gebruikersnaam = '$Gebruikersnaam'"; //De query maken
                                    $stmt = $db->prepare($sql); //Statement object aanmaken
                                    $stmt->execute();
                                }
                            }
                        }
                    }
                    ?>
                </div>
                <!-- Lopende veilingen -->
                <div class="tab-pane fade " id="item3" role="tabpanel">
                    <?php
                    $sql = "SELECT * FROM Voorwerp Where VeilingGesloten = 0 AND Verkoper = '$gebruikersnaam';";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        $Looptijd = $row[0];
                        $LooptijdbeginDag = $row[1];
                        $LooptijdbeginTijdstip = $row[2];
                        $LooptijdeindeDag = $row[3];
                        $LooptijdeindeTijdstip = $row[4];
                        $Startprijs = $row[5];
                        $Verkoper = $row[6];
                        $Koper = $row[7];
                        $Verzendkosten = $row[8];
                        $Verkoopprijs = $row[9];
                        $Beschrijving = $row[10];
                        $Betalingswijze = $row[11];
                        $Betalingsinstructie = $row[1];
                        $Land = $row[13];
                        $Plaatsnaam = $row[14];
                        $Titel = $row[15];
                        $Verzendinstructies = $row[16];
                        $Voorwerpnummer = $row[17];
                        $VeilingGesloten = $row[18];
                        $VoorwerpCover = $row[19];

                    }
                    if (!empty($Titel)) {
                        for ($i = 0; $i < count($Titel); $i++) {
                            echo '
                        <a href="productpagina.php?product=' . $Voorwerpnummer . '">
                            <div class="col-md-3 itemBox roundborder " align="center">
                                <img class="imgStyle roundborder" src="media/' . $VoorwerpCover . '"/>
                                <h4><a class="textDarkGray" href="productpagina.php?product=' . $Voorwerpnummer . '">
                                ' . $Titel . '</a></h4>
                                <div class="description">
                                ' . $Beschrijving . '
                                </div>
                                <a href="productpagina.php?product=' . $Voorwerpnummer . '" class="btn btn-default crete" role="button">Bieden</a>
                            </div>
                        </a>
                    ';
                        }
                    } else {
                        echo '
                        <div class="col-md-12 marginTop5"><p>U heeft momenteel nog geen lopende veilingen.</p></div>
                        ';
                    }
                    ?>
                </div>
                <!-- Biedgeschiedenis -->
                <div class="tab-pane fade " id="item4" role="tabpanel">
                    <?php
                    //de voorwerpen selecteren waarop is geboden
                    $sql = "SELECT DISTINCT (Voorwerpnummer),VoorwerpCover,Titel,Beschrijving FROM Bod
                            JOIN Voorwerp ON Bod.Voorwerp = Voorwerp.Voorwerpnummer
                            WHERE Bod.Gebruiker = '$gebruikersnaam';";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        $Voorwerpnummer1[] = $row[0];
                        $VoorwerpCover1[] = $row[1];
                        $Titel1[] = $row[2];
                        $Beschrijving1[] = $row[3];
                    }
                    if (!empty($Titel)) {
                        for ($i = 0; $i < count($Titel1); $i++) {
                            echo '
                        <a href="productpagina.php?product=' . $Voorwerpnummer1[$i] . '">
                            <div class="col-md-3 itemBox roundborder " align="center">
                                <img class="imgStyle roundborder" src="media/' . $VoorwerpCover1[$i] . '"/>
                                <h4><a class="textDarkGray" href="productpagina.php?product=' . $Voorwerpnummer1[$i] . '">
                                ' . $Titel1[$i] . '</a></h4>
                                <div class="description">
                                ' . $Beschrijving1[$i] . '
                                </div>
                                <a href="productpagina.php?product=' . $Voorwerpnummer1[$i] . '" class="btn btn-default crete" role="button">Bieden</a>
                            </div>
                        </a>
                    ';
                        }
                    } else {
                        echo '
                        <div class="col-md-12 marginTop5"><p>U heeft nog nergens op geboden.</p></div>
                        ';
                    }
                    ?>
                </div>
                <!-- Gewonnen Veilingen-->
                <div class="tab-pane fade " id="item6" role="tabpanel">
                    <?php
                    $SessioncookieUsername = $_SESSION['username'];
                    $sql = "SELECT Voorwerpnummer,VoorwerpCover,Titel,Beschrijving FROM Voorwerp WHERE Koper = '$SessioncookieUsername'";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        $Voorwerpnummer2[] = $row[0];
                        $VoorwerpCover2[] = $row[1];
                        $Titel2[] = $row[2];
                        $Beschrijving2[] = $row[3];
                    }
                    if (!empty($Voorwerpnummer2[0])) {
                        for ($i = 0; $i < count($Voorwerpnummer2); $i++) {
                            echo '
                        <a href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '">
                            <div class="col-md-3 itemBox roundborder " align="center">
                                <img class="imgStyle roundborder" src="media/' . $VoorwerpCover2[$i] . '"/>
                                <h4><a class="textDarkGray" href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '">
                                ' . $Titel2[$i] . '</a></h4>
                                <div class="description">
                                ' . $Beschrijving2[$i] . '
                                </div>
                            </div>
                        </a>
                    ';
                        }
                    } else {
                        echo '
                        <div class="col-md-12 marginTop5"><p>U heeft nog niks gewonnen.</p></div>
                    ';
                    }
                    ?>
                </div>
                <!-- Telfoonnummers toevoegen -->

                <div class="tab-pane fade marginTop5 " id="item7" role="tabpanel">
                    <?php
                    $sql = "SELECT Telefoon FROM Gebruikerstelefoon WHERE Gebruiker = '$SessioncookieUsername'";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        $eerdergeplaatstenummers[] = $row[0];
                    }
                    if (!empty($eerdergeplaatstenummers[0])) {
                        echo '<h2>Je huidige telefoonnummers:</h2>';
                        echo '<table>';
                        for ($i = 0; $i < count($eerdergeplaatstenummers); $i++) {
                            echo '<tr><td>' . $eerdergeplaatstenummers[$i] . '</td></tr>';
                        }
                        echo '</table>';
                    }
                    ?>
                    <div>
                        <form method="post" action="">
                            <?php
                            echo '<h2>Voeg een telefoonnummer toe:</h2>';
                            echo '
                            <div class="form-group">
                                <input type="tel" name="telefoonnummer" class="form-control" placeholder="0261234567" > 
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn-default btn" value="voeg toe" role="button" name="submitTel"> 
                            </div>
                            ';
                            ?>
                        </form>
                    </div>
                    <?php
                    if (isset($_POST['submitTel']) && $_POST['telefoonnummer'] != '') {
                        $telefoonnummer = $_POST['telefoonnummer'];
                        $sql = "INSERT INTO Gebruikerstelefoon VALUES ('$SessioncookieUsername','$telefoonnummer')";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                    }
                    if (isset($_POST['submitTel']) && $_POST['telefoonnummer'] == '') {
                        echo "<p>wel een telefoonnummer toevoegen</p>";
                    }


                    ?>
                </div>
                <!-- Uitloggen -->
                <div class="tab-pane fade marginTop5 " id="item8" role="tabpanel">
                    <a href="uitloggen.php" class="btn btn-primary" role="button">Uitloggen</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php';
?>

