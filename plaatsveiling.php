<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plaats veiling - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
</head>

<?php
ob_start();
session_start();
if (isset($_SESSION['username'])){

include 'includes/header.php';
include 'includes/catbar.php';
require_once 'includes/functies.php';

?>

<body>
<div class="container marginTop20">
    <div class="col-md-12" align="center">
        <h1>Plaats hier je veiling:</h1>
    </div>
    <div class="row">
        <div class="col-md-12 offset-md-6 marginTop20">
            <form method="post" action="">
                <div class="form-group">
                    <label for="titel_voorwerp">Titel</label>
                    <input type="text" class="form-control" id="titel_voorwerp" name="titel" placeholder="Kast"
                           required>
                </div>
                <div class="form-group">
                    <label for="beschrijving_voorwerp">Beschrijving</label>
                    <textarea class="form-control" id="beschrijving_voorwerp" name="beschrijving" rows="2"
                              placeholder="Mooie kast" maxlength="500" required></textarea>
                </div>
                <div class="form-group">
                    <label for="startprijs-voorwerp">Startprijs (optioneel)</label>
                    <input type="number" class="form-control" id="startprijs-voorwerp" name="startprijs" min="0"
                           placeholder="5">
                </div>
                <div class="form-group">
                    <label for="verkoopprijs    -voorwerp">Maximumprijs</label>
                    <input type="number" class="form-control" id="verkoopprijs-voorwerp" name="verkoopprijs" min="0"
                           placeholder="50" required>
                </div>
                <div class="form-group">
                    <label for="betalingswijze_voorwerp">Betalingswijze</label>
                    <select class="form-control" id="betalingswijze_voorwerp" name="betalingswijze" required>
                        <option>Paypal</option>
                        <option>Bank/Giro</option>
                        <option>Contant</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="betalingsinstructie_voorwerp">Betalingsinstructie</label>
                    <textarea class="form-control" id="betalingsinstructie_voorwerp" name="betalingsinstructie" rows="2"
                              placeholder="Het liefst contant" required></textarea>
                </div>
                <div class="form-group">
                    <label for="betalingsinstructie_voorwerp">Verzendinstructie</label>
                    <textarea class="form-control" id="verzendinstructie_voorwerp" name="verzendinstructie" rows="2"
                              placeholder="Kom naar mijn adres" required></textarea>
                </div>
                <div class="form-group">
                    <label for="looptijd-voorwerp">Looptijd</label>
                    <select class="form-control" id="looptijd-voorwerp" name="looptijd" required>
                        <option value="3">3 dagen</option>
                        <option value="5">5 dagen</option>
                        <option value="7">7 dagen</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="plaats bieding" name="submit">
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<?php

if (isset($_POST['submit'])) {

    $verkoper = $_SESSION['username'];

    $sql = "SELECT Land, Plaatsnaam FROM Gebruiker WHERE Gebruikersnaam = '$verkoper'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $land = $row[0];
        $plaatsnaam = $row[1];
    }

    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    if (isset($_POST['startprijs'])) {
        $startprijs = $_POST['startprijs'];
    } else {
        $startprijs = 0;
    }
    $betalingswijze = $_POST['betalingswijze'];
    $betalingsinstructie = $_POST['betalingsinstructie'];
    $verzendinstructie = $_POST['verzendinstructie'];
    $looptijd = $_POST['looptijd'];
    $verkoopprijs = $_POST['verkoopprijs'];
    $sql = "INSERT INTO Voorwerp([Looptijd], [Startprijs], [Verkoper], [Beschrijving], [Betalingswijze], [Betalingsinstructie], [Land], [Plaatsnaam], [Titel], [Verzendinstructies], [VoorwerpCover], [Verkoopprijs], [VeilingGesloten])
                VALUES('$looptijd', '$startprijs', '$verkoper', '$beschrijving', '$betalingswijze', '$betalingsinstructie', '$land', '$plaatsnaam', '$titel', '$verzendinstructie', 'default.png', '$verkoopprijs', 0)";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "SELECT TOP 1 Voorwerpnummer FROM Voorwerp ORDER BY Voorwerpnummer DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $id[] = $row[0];
    }
    echo $id[0];
    $_SESSION['voorwerpnummer'] = $id[0];
    ob_end_clean();
    header('Location: veilinginrubriek.php');
}
}
//else{
//    header('Location: index.php');
//    die();
//} xd
ob_end_flush();
?>