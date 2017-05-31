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
//als er geen gebruikersnaam is ingevuld dan komt het invoerveldje waar de gebruiker de gebruikersnaam moet invullen
?>
<div class="container marginTop20 ">
    <div class="col-md-12" align="center">
        <div class="col-md-3"></div>

        <div class="col-md-6 controlBox container-fluid text-center marginTop30">

            <h2>Wachtwoord vergeten?</h2>
            <hr>
            <p>Kan gebeuren, geeft niks.</p>
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
//als de gebruikersnaam is gezet dan wordt er de vraag gecontroleerd
} else {
    $gebruikersnaam = $_POST['gebruikersnaam'];

    $sql = "SELECT Wachtwoord FROM Gebruiker WHERE Gebruikersnaam = '$gebruikersnaam'";
    $stmt = $db->prepare($sql); //Statement object aanmaken
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $huidigWachtwoord = $row[0];
    }

    echo '<form action="" method="post">';
    echo '<div class="form-group">';
    echo '<select name="vraag">';
    $sql = "SELECT TekstVraag, Vraagnummer FROM Vraag";
    $stmt = $db->prepare($sql); //Statement object aanmaken
    $stmt->execute();           //Statement uitvoeren
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelrij uitgelezen
    {
        $vragen[] = $row[0];
        $nummers[] = $row[1];
    }
    for ($i = 0; $i < count($vragen); $i++) {
        echo '<option value="' . $nummers[$i] . '"> ' . $vragen[$i] . ' </option)>';
    }
    echo '</select>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="antwoord" >Antwoord:</label>';
    echo '<input id="antwoord" name="antwoord" placeholder="antwoord" type="text" class="form-control">';
    echo '<input type="hidden" value=' . $gebruikersnaam . ' name="gebruikersnaam">';
    echo '</div>';
    echo '<input type="submit" value="submit" class="btn-ibis btn">';
    echo '</form>';
}

if (isset($_POST['gebruikersnaam']) && isset($_POST['antwoord'])) {
    $sql = "SELECT Vraag.TekstVraag, Antwoordtekst, email FROM Gebruiker JOIN Vraag ON Gebruiker.Vraag = Vraag.Vraagnummer WHERE Gebruikersnaam = '$gebruikersnaam'";
    $stmt = $db->prepare($sql); //Statement object aanmaken
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $DBvraag = $row[0];
        $DBantwoord = $row[1];
        $email = $row[2];
    }

    if ($_POST['vraag'] == $DBvraag && $_POST['antwoord'] == $DBantwoord) {
        $code = mt_rand();
        $codePwd = password_hash($code, PASSWORD_DEFAULT);

        $sql = "UPDATE Gebruiker SET Wachtwoord = $codePwd WHERE Gebruikersnaam = '$gebruikersnaam'";
        $stmt = $db->prepare($sql); //Statement object aanmaken
        $stmt->execute();

// 3.2 Nu wordt er een mail verstuurd met de code erin
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: EenmaalAndermaal Veiling <EenmaalAndermaal@iConcepts.nl>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $onderwerp = 'Nieuw Wachtwoord EenmaalAndermaal' . "\r\n";
        $bericht = 'Dit is uw nieuwe wachtwoord: ' . $code . ', Dit kunt u veranderen bij "Mijn profiel".' . "\r\n";
        mail($email, $onderwerp, $bericht, $headers);

// 4. De gebruiker wordt naar het inlogscherm gestuurd
        header("Location: inloggen.php");
    }else{
        echo 'De vraag en/of het antwoord is niet juist';
    }
}

include 'includes/footer.php';
?>