<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inloggen - Eenmaal Andermaal</title>
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
//pdo_connect();
//login();
?>
<main>

    <div class="container marginTop20 marginBottom40">
        <div class="col-md-12" align="center">
            <h1>Log in op jouw profiel</h1>
        </div>

        <div class="col-md-12 marginTop20" align="center">
            <div class="col-md-2 marginTop20 text-left">
            </div>
            <div class="col-md-4 marginTop20 text-left loginBox">
                <form class="form-horizontal">
                    <h3 class="">Inloggen</h3>

                    <div class="form-group marginBottom20">
                        <label class="control-label col-sm-3" for="email">Gebruikersnaam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="gebuikersnaam">
                            <span class="error">* <?php echo $gebruikersnaamErr; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="pwd">Wachtwoord</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwd" name="wachtwoord">
                            <span class="error">* <?php echo $wachtwoordErr; ?></span>
                        </div>
                    </div>
                    <div class="form-group marginTop35">
                        <div class="col-sm-12">
                            <button id="regaanmelden" type="submit" name="inloggen" class="btn btn-default col-sm-4"
                                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">Inloggen
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4 marginTop20 loginBox text-left" align="center">
                <form class="form-horizontal">
                    <h3 class="">Maak jouw account aan!</h3>
                    <div class="form-group ">
                        <p class="textSize14 marginLeft15">
                            Om in te loggen heb je een account nodig voor Mijn Account. Je kunt dan voortaan:
                        </p>
                        <ul>
                            <li>Veilingen bewaren</li>
                            <li>Je biedingen in de gaten houden</li>
                            <li>Eigen veilingen beheren</li>
                        </ul>
                    </div>
                    <div class="form-group marginTop50">
                        <div class="col-sm-12">
                            <a href="registreren.php" class="btn btn-default" role="button">Registreren</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2 marginTop20 text-left">
            </div>
        </div>
    </div>

</body>
</html>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


<?php

include('functies.php');
//alle variabelen worden gedefinieerd en op lege waardes gezet
$gebruikersnaam = $wachtwoord = "";
$gebruikersnaamErr = $wachtwoordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Gebruikersnaam"])) {
        $gebruikersnaamErr = "De gebruikersnaam ontbreekt!";
    } else {
        $gebruikersnaam = test_input($_POST["Gebruikersnaam"]);
    }

    if (empty($_POST["Wachtwoord"])) {
        $wachtwoordErr = "Voer uw wachtwoord in!";
    } else if ($_POST["Wachtwoord"]) {
        $wachtwoordErr = "Uw wachtwoord moet minstens 6 karakters lang zijn!";
    } else {
        $wachtwoord = test_input($_POST["Wachtwoord"]);
//        if (!preg_match("/^[a-zA-Z0-9]*$/",$wachtwoord)) {
        if (!check_password($wachtwoord, 6, 2)) { //met deze functie wordt de complexiteit en de lengte van het
            // wachtwoord gecontroleerd, de 6 weergeeft de minimale lengte van het wachtwoord, de 2 staat voor de
            // complexiteit 2 betekent hier dat het minstens 1 kleine, 1 hoofdleter en 1 getal moet bevatten
            $wachtwoordErr = "Het wachtwoord moet 1 kleine letter, 1 hoofdletter en 1 getal bevatten!";
        }
    }
}

include 'footer.php';
?>