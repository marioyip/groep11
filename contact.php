<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eenmaal Andermaal - </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.html' ?>
<main>

<div class="container marginTop20">
    <div>
        <h1>Contact</h1>
        <hr>
        <h2>Lucht je hart</h2>
    </div>
    <div>
        <br>
        <form>
            <div class="form-group">
                <label for="emailadresVanGebruiker">Email</label>
                <input type="email" class="form-control" id="emailadresVanGebruiker" placeholder="Voer je email-adres in"
            </div>
        </form>
        <br>
        <form>
            <div class="form-group">
                <label for="tekstvakFeedback">Wat kunnen we voor je doen?</label>
                <textarea class="form-control" rows="3" placeholder="Ga ervoor."></textarea>
            </div>
        </form>
        <div>
            <button type="button" class="btn btn-default submit">
                Verstuur
            </button>
        </div>
    </div>
    <hr>
    <h2>Locatie</h2>
    <div class="row">
        <div class="col-md-6">
            Ruitenberglaan 26, CC Arnhem<br>
            Faculteit Techniek, lokaal D.302<br>
            Beschikbaar op maandag t/m vrijdag behalve op donderdag<br>
            9.00 tot 17.00<br>
        </div>
        <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2457.0254106741404!2d5.94810026525595!3d51.98819048325708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c7a46f929cd183%3A0xcdf70958de3cc196!2sFaculteit+Techniek+HAN+University!5e0!3m2!1sen!2snl!4v1493913562058" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
    <hr>
    <div class="col-md-12">
        <h1>FAQ</h1>
            <div>
                <h3>Is registreren gratis?</h3>
                <h4>&#8594; JA! Natuurlijk is registreren gratis!</h4>
            </div>
    </div>

</div>

<?php include 'footer.php'?>
