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
require_once('functies.php');

connectToDatabase();
global $db;

//alle variabelen worden gedefinieerd en op lege waardes gezet
$gebruikersnaam = $wachtwoord = $leegveld = "";
$gebruikersnaamErr = $wachtwoordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "hoi1";
    if (empty($_POST["gebruikersnaam"]) || empty($_POST["wachtwoord"])) {
        $leegveld = "De gebruikersnaam en het wachtwoord moeten beide ingevuld zijn!";
        echo "hoi2";
    } else {
        $gebruikersnaam = test_input($_POST["gebruikersnaam"]);
        $wachtwoord = test_input($_POST['wachtwoord']);
        echo "hoi3";
    }

    //Als password ok is dan true, anders false.
    $password_ok = false;

    $input['gebruikersnaam'] = $_POST['gebruikersnaam'] ?? '';
    $ingevoerde_ww = $_POST['wachtwoord'] ?? '';

    $stmt = $db->prepare('SELECT Wachtwoord FROM Gebruiker WHERE Gebruikersnaam = ?');
    $stmt->execute([$input['gebruikersnaam']]);
    $row = $stmt->fetch();

    if ($row) {
        $password_ok = password_verify($ingevoerde_ww,$row[15]);
    }
    if (!$password_ok) {
        $errors[]='Voer een juiste gebruikersnaam en wachtwoord in!';
    }
    return array($input);

//    $query1 = "SELECT * FROM Gebruiker WHERE Gebruikersnaam = $gebruikersnaam AND Wachtwoord = $wachtwoord";
//    $stmt = $db->prepare($query1);
//    $stmt->execute();
//    if ($stmt->fetchColumn() == 1) {
//        echo "jaaaaaa";
//        session_start();
//        $_SESSION['inloggen'];
//    }
}

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
                <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <h3 class="">Inloggen</h3>

                    <div class="form-group marginBottom20">
                        <label class="control-label col-sm-3" for="email">Gebruikersnaam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="gebuikersnaam">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="pwd">Wachtwoord</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwd" name="wachtwoord">
                            <div class="alert alert-danger"><?= $leegveld ?></div>
                        </div>
                    </div>
                    <div class="form-group marginTop35">
                        <div class="col-sm-12">
                            <button id="regaanmelden" type="submit" name="inloggen" class="btn btn-default col-sm-4"
                                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"; method="post">Inloggen
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

include 'footer.php';

