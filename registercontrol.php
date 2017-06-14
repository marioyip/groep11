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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
</head>
<body>

<?php
ob_start();
session_start();
include('includes/header.php');
include('includes/catbar.php');

$error = "";
$persoonlijkeCode = $_SESSION['code'];
//echo $_SESSION['code'];

if (isset($_POST['bevestigcode']) && empty($error)) {
//het schrijven van de email zelf
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From: EenmaalAndermaal Veiling <EenmaalAndermaal@iConcepts.nl>' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $onderwerp = 'Bevestigingsmail EenmaalAndermaal' . "\r\n";
    $bericht = 'Dit is uw bevestigingscode: ' . $_SESSION['code'] . '' . "\r\n";
    mail($_SESSION['email'], $onderwerp, $bericht, $headers);
}

//    echo $code.'<br>';
//    echo $emailadres;

?>
<div class="container marginTop20">
    <div class="col-md-12" align="center">
        <div class="col-md-3"></div>
        <div class="col-md-6 controlBox container-fluid marginTop30">
            <h2>Verificatiecode invoeren</h2>
            <hr>
            <p> Er is een email gestuurd naar het volgende mail adres: <?php echo $_SESSION['email'] ?><br> Met de
                code in de mail kunt u verder met de registratie. </p>
            <div class="">
                <form method="POST">
                    <div class="form-group ">
                        <label for="ingevoerdecode">Uw ontvangen code:
                            <input id="ingevoerdecode" class="form-control" type="text" name="ingevoerdecode"></label>
                    </div>
                    <?php
                    if (isset($_POST['bevestigcode'])) {
                        $ingevoerdeCode = $_POST['ingevoerdecode'];
                        if (empty($ingevoerdeCode)) {
                            $error = 'U heeft de code niet ingevoerd!';
                        }
                        if (!empty($persoonlijkeCode) && $persoonlijkeCode != $ingevoerdeCode) {
                            $error = 'De ingevoerde code is onjuist';
                        } else if ($persoonlijkeCode == $ingevoerdeCode) {
                            $_SESSION['persoonlijkeCode'] = $ingevoerdeCode;
                            ob_end_clean();
                            header("Location: registratieAfronden.php");
                        }
                        if ($error != "") {
                            echo isset($_POST['bevestigcode']) ? "<div class='alert alert-danger'> <p>" . $error . "</p></div>" : "";
                        }
                    }
                    ?>
                    <div class="form-group marginTop20">
                        <input type="submit" name="bevestigcode" value="bevestigcode" class="btn-default btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php

include('includes/footer.php');
ob_end_flush();

?>
