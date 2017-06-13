<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Bootstrap css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Bootstrap css-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
session_start();
include 'includes/header.php'; //Geeft de header mee
include 'includes/catbar.php'; ?><!-- Geeft de categorieën bar mee-->
<main>

    <div class="container marginTop20">
        <div>
            <div class="page-header">
                <h1 class="textGreen text-center">Contact</h1>

            </div>
            <h3 class="textDarkGray">Neem contact met ons op</h3>
        </div>
        <div>
            <br>
            <form>
                <div class="form-group">
                    <label for="emailadresVanGebruiker">Email</label>
                    <input type="email" class="form-control" id="emailadresVanGebruiker"
                           placeholder="Voer je email-adres in"/> <!--invoerveld voor het emailadres-->
                </div>
            </form>
            <br>
            <form>
                <div class="form-group">
                    <label for="tekstvakFeedback">Wat kunnen we voor je doen?</label>
                    <textarea class="form-control" rows="3" placeholder="Ga ervoor."></textarea>
                    <!--invoerveld om een vraag te kunnen stellen-->
                </div>
            </form>
            <div>
                <button type="button" class="btn btn-default submit">
                    Verstuur
                </button>
            </div>
        </div>
        <hr>
        <h3 class="textDarkGray">Locatie</h3>
        <div class="row">
            <div class="col-md-6">
                <p>
                    Ruitenberglaan 26, CC Arnhem<br>
                    Faculteit Techniek, lokaal D.302<br>
                    Beschikbaar op maandag t/m vrijdag behalve op donderdag<br>
                    9.00 tot 17.00<br></p>
            </div>
            <div class="col-md-6">
                <!--laat een kaart zien van google maps met de locatie van ons bedrijf (Ruitenberglaan 26)-->
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2457.0254106741404!2d5.94810026525595!3d51.98819048325708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c7a46f929cd183%3A0xcdf70958de3cc196!2sFaculteit+Techniek+HAN+University!5e0!3m2!1sen!2snl!4v1493913562058"
                        width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php' ?> //geeft de footer mee aan deze pagina
