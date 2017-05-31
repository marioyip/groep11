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
session_start();
include 'includes/header.php';
include 'includes/catbar.php';
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

//if(isset($_POST['bevestigmail'])) {
$_SESSION['voornaam'] = $_POST['voornaam'];
$_SESSION['achternaam'] = $_POST['achternaam'];
$_SESSION['emailadres'] = $_POST['emailadres'];

$_SESSION['code'] = mt_rand();
echo $_SESSION['code'];

//het schrijven van de email zelf
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'From: EenmaalAndermaal Veiling <EenmaalAndermaal@iConcepts.nl>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$onderwerp = 'Bevestigingsmail EenmaalAndermaal' . "\r\n";
$bericht = 'Dit is uw bevestigingscode: ' . $_SESSION['code'] . '' . "\r\n";
mail($_SESSION['emailadres'], $onderwerp, $bericht, $headers);

//    echo $code.'<br>';
//    echo $emailadres;

?>
<div class="container marginTop20">
    <div class="col-md-12" align="center">
        <div class="col-md-3"></div>
        <div class="col-md-6 controlBox container-fluid marginTop30">
            <h2>Verificatiecode invoeren</h2>
            <hr>
            <p> U heeft een registratiecode naar uw emailadres gestuurd gekregen, hiermee kan u uw account verifiëren.</p>
            <div class="">
                <form method="POST" action="registratieAfronden.php">
                    <div class="form-group ">
                        <label for="ingevoerdecode">Uw ontvangen code:
                            <input id="ingevoerdecode" class="form-control" type="text" name="ingevoerdecode"></label>
                    </div>
                    <div class="form-group ">
                        <label for=" emailingevoerd">Uw emailadres:
                            <input id="emailingevoerd" class="form-control" type="text" name="emailingevoerd"></label>
                    </div><div class="beschrijving"></div>
                    <div class="form-group marginTop20">
                        <input type="submit" name="bevestig" value="bevestig" class="btn-default btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
include 'includes/footer.php'
?>
