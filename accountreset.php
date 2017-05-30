<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wachtwoord Vergeten - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--bootstrap css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!--bootstrap css-->
    <link rel="stylesheet" href="css/style.css"> <!--eigen css-->
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png"> <!--tabblad icoontje-->

</head>
<body>

<?php
include 'includes/header.php';
include 'includes/catbar.php';

if (empty($_POST['gebruikersnaam'])){

    ?>
    <div class="container marginTop20 ">
        <div class="col-md-12" align="center">
            <div class="col-md-3"></div>

            <div class="col-md-6 controlBox container-fluid text-center marginTop30">

                <h2>Wachtwoord vergeten?</h2>
                <hr>
                <p>Kan gebeuren, geeft niks.</p>
                <p>Wij sturen een code naar jou toe via de email, dat vul je in en klaar is kees.</p>
                <div class="form-group col-md-12 textCenter">
                    <form action="" method="post">
                        <label class="control-label col-sm-3" for="gebruikersnaam">Gebruikersnaam</label>
                        <input class="form-control" type="text" id="gebruikersnaam" name="gebruikersnaam"
                               placeholder="Hans123">
                        <input type="submit" class="btn-default btn" value="verstuur" align="center">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <?php
} else {

if (isset($_POST['gebruikersnaam'])) {
//  1. is de gebruikersnaam in de database?
$gebruikersnaam = $_POST['gebruikersnaam'];

$sql = "SELECT Wachtwoord FROM Gebruiker WHERE Gebruikersnaam = '$gebruikersnaam'";
$stmt = $db->prepare($sql); //Statement object aanmaken
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $huidigWachtwoord = $row[0];
}
//  2. wat was je vraag en welk antwoord had je?
?>
<div class="container marginTop20 ">
    <div class="col-md-3"></div>
    <div class="form-group controlBox col-md-6 text-center marginTop30">
        <h2>Beveiligingsvraag</h2>
        <hr>
        <form action="" method="post">
            <label class="control-label col-sm-3 marginTop20" for="vraag">Vraag</label>
            <select name="vraag" class="form-control ">
                <option value="1"> Wat is mijn favoriete huisdier ?</option>
                <option value="2"> Wat is mijn geboorteplaats ?</option>
                <option value="3"> Wie is mijn jeugdvriend ?</option>
                <option value="4"> Wat is de meisjesnaam van mijn moeder ?</option>
            </select>
            <label class="control-label col-sm-3 marginTop20" for="antwoord">Antwoord</label>
            <input type="text" class="form-control " name="antwoord" id="antwoord">
            <input type="submit" class="btn-default btn marginTop20" value="verstuur">
        </form>
    </div>
</div>
<?php
//  2.1 de gekozen vraag en antwoord declareren
if (isset($_POST['vraag']) && isset($_POST['antwoord']) && !empty($_POST['vraag']) && !empty($_POST['antwoord'])) {

    $vraag = $_POST['vraag'];
    $antwoord = $_POST['antwoord'];

//  2.2 kijken of vraag en antwoord de database matchen

    $sql = "SELECT Vraag, Antwoordtekst, email FROM Gebruiker WHERE Gebruikersnaam = '$gebruikersnaam'";
    $stmt = $db->prepare($sql); //Statement object aanmaken
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $DBvraag = $row[0];
        $DBantwoord = $row[1];
        $email = $row[2];
    }

    if ($vraag == $DBvraag && $antwoord == $DBantwoord) {
        //  3 Nu blijkt dat de vraag en het antwoord kloppen, wordt er een mail verstuurd naar de gebruiker met zijn nieuwe wachtwoord.

        //  3.1 Hiervoor wordt een willekeurige code gemaakt die ook wordt gehashed en in de db wordt gezet.
        $code = mt_rand();
        $codePwd = password_hash($code, PASSWORD_DEFAULT);

        $sql = "UPDATE Gebruiker SET Wachtwoord = $codePwd WHERE Gebruikersnaam = '$gebruikersnaam'";
        $stmt = $db->prepare($sql); //Statement object aanmaken
        $stmt->execute();

        //  3.2 Nu wordt er een mail verstuurd met de code erin
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: EenmaalAndermaal Veiling <donotreply@eenmaalandermaal.nl>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $onderwerp = 'Nieuw Wachtwoord EenmaalAndermaal' . "\r\n";
        $bericht = 'Dit is uw nieuwe wachtwoord: ' . $code . '' . "\r\n";
        $bericht = 'Het is verstandig om het wachtwoord te veranderen, dit kan bij "Mijn Profiel" ' . "\r\n";
        mail($email, $onderwerp, $bericht, $headers);

        //  4. De gebruiker wordt naar het inlogscherm gestuurd


    } else {
        echo 'foutmelding, vraag is niet hetzelfde als het antwoord';
        //foutmelding dat het antwoord op de vraag niet hetzelfde is
    }
}
}

}
include 'includes/footer.php';
?>