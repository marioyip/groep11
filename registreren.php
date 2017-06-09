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
ob_start();
session_start();

if (isset($_SESSION['username'])) {
    ob_end_clean();
    header("Location: index.php");
}

include ('includes/header.php');
include ('includes/catbar.php');
?>
<main>
    <div class="container marginTop20">
        <div class="col-md-12" align="center">
            <h1 class="textGreen">Maak jouw account aan!</h1>
            <hr>
        </div>
        <div class="col-md-12 marginTop20" align="center">
            <div class="col-md-9 marginTop20 text-left">
                <form class="form-horizontal" method="post" action="#">
                    <div class="form-group">
                        <h3>Accountgegevens</h3>
                        <label class="control-label col-sm-2 text-left" for="email">Voornaam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="voornaam" id="email"
                                   placeholder="Kees">
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['bevestigmail'])) {
                        $voornaam = strip_tags($_POST['voornaam']);
                        $errorVoornaam = "";
                        if (empty($voornaam)) {
                            $errorVoornaam = 'U heeft uw voornaam niet ingevuld!';
                        }
                        if ($errorVoornaam != "") {
                            echo isset($_POST['bevestigmail']) ? "<div class='alert alert-danger'> <p>" . $errorVoornaam . "</p></div>" : "";
                        }
                    }
                    ?>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Achternaam:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="achternaam" id="pwd"
                                   placeholder="van Dalen">
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['bevestigmail'])) {
                        $achternaam = strip_tags($_POST['achternaam']);
                        $errorAchternaam = "";
                        if (empty($achternaam)) {
                            $errorAchternaam = 'U heeft uw achternaam niet ingevuld!';
                        }
                        if ($errorAchternaam != "") {
                            echo isset($_POST['bevestigmail']) ? "<div class='alert alert-danger'> <p>" . $errorAchternaam . "</p></div>" : "";
                        }
                    }
                    ?>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">E-mailadres:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control marginLeft200" name="emailadres" id="email"
                                   placeholder="k.vandalen@email.com">
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['bevestigmail'])) {
                        $errorEmail = "";
                        $email = strip_tags($_POST['emailadres']);
                        if (empty($email)) {
                            $errorEmail = 'U heeft uw e-mailadres niet ingevuld!';
                        }
                        if ($errorEmail != "") {
                            echo isset($_POST['bevestigmail']) ? "<div class='alert alert-danger'> <p>" . $errorEmail . "</p></div>" : "";
                        }
                    }
                    ?>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Herhaal E-mailadres:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control marginLeft200" name="emailadres2" id="email"
                                   placeholder="k.vandalen@email.com">
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['bevestigmail'])) {
                        $errorControle = "";
                        $email = strip_tags($_POST['emailadres']);
                        $email2 = strip_tags($_POST['emailadres2']);
                        if (empty($email2)) {
                            $errorControle = 'U heeft uw e-mailadres niet bevestigd!';
                        }
                        if (!empty($voornaam) && !empty($achternaam) && !empty($email)) {
                            if ($email == $email2) {
                                $_SESSION['email'] = strip_tags($email);
                                $_POST['voornaam'] = strip_tags($_POST['voornaam']);
                                $_POST['achternaam'] = strip_tags($_POST['achternaam']);
                                $_SESSION['voornaam'] = $_POST['voornaam'];
                                $_SESSION['achternaam'] = $_POST['achternaam'];
                                $_SESSION['code'] = mt_rand();
//                                $gelukt = 'De bevestigingscode om een account aan te kunnen maken wordt verstuurd naar uw e-mailadres';
                                ob_end_clean();
                                header("Location: registercontrol.php");
                            } else if ($email != $email2) {
                                $errorControle = 'Uw email-adres komt niet overeen met het bevestigende e-mailadres';
                            }
                        }
                        if ($errorControle != "") {
                            echo isset($_POST['bevestigmail']) ? "<div class='alert alert-danger'> <p>" . $errorControle . "</p></div>" : "";
                        }
                    }
                    ?>
                    <div class="form-group">
                        <input type="submit" value="bevestig" name="bevestigmail" class="btn-default btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>

<?php
include('includes/footer.php');
ob_end_flush();

