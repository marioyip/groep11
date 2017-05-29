<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Over ons - Eenmaal Andermaal</title>
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
session_start();
include 'includes/header.php'; //geeft de header mee aan deze pagina
include 'includes/catbar.php'; //geeft de cattegorieën balk mee aan deze pagina
?>
<main>


    <div class="containerMain">
        <div class="container marginTop20">
            <div class="col-md-12">
                <h1 class="textGreen text-center">Over ons</h1>
                <hr>
            </div>
        </div>
        <div class="container">
            <div class="col-md-12 marginBottom70">
                <div class="container marginTop10">
                    <h3 class="text-center">Wie zijn wij?</h3>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-5 marginTop20 text-left">
                        <!--paragraaf over waar de website voor staat-->

                        <p>Eenmaal Andermaal is opgericht in 2017, door een groep developers die het “anders” willen doen.
                            Veel ervaring is opgedaan bij toonaangevende bedrijven op het gebied van webdevelopment,
                            datamanagement en analyse. Daarnaast heeft het ontwikkelen van alles het internet te bieden
                            heeft geen geheimen
                            voor ons.
                            Aangevuld met expertise op het gebied van “cutting edge” marketing en communicatie, staan wij
                            voor u klaar om uw volgende stap op internet tot een succes te maken.</p>
                    </div>
                    <div class="col-md-5 marginTop20">
                        <img class="imgStyle" src="media/ons-team.jpg" alt="project-team">
                        <!--afbeelding van een projectteam-->
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                <div class="container marginTop10">
                    <h3 class="text-center">Wat doen wij?</h3>
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-5 marginTop20">
                        <img class="imgStyle" src="media/ons.jpg" alt="oude man"> <!--afbeelding van een projectteam-->
                    </div>
                    <div class="col-md-5 marginTop20 text-left">
                        <!--paragraaf over waar de website voor staat-->

                        <p>Eenmaal Andermaal is opgericht in 2017, door een groep developers die het “anders” willen doen.
                            Veel ervaring is opgedaan bij toonaangevende bedrijven op het gebied van webdevelopment,
                            datamanagement en analyse. Daarnaast heeft het ontwikkelen van alles het internet te bieden
                            heeft geen geheimen
                            voor ons.
                            Aangevuld met expertise op het gebied van “cutting edge” marketing en communicatie, staan wij
                            voor u klaar om uw volgende stap op internet tot een succes te maken.</p>
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
                <div class="container marginTop10">
                    <h3 class="text-center">Hoe doen wij dat?</h3>
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-5 marginTop20 text-left">
                        <!--paragraaf waarin de aanpak van het bedrijf wordt beschreven-->

                        <p>Eenmaal Andermaal is opgericht in 2017, door een groep developers die het “anders” willen doen.
                            Veel ervaring is opgedaan bij toonaangevende bedrijven op het gebied van webdevelopment,
                            datamanagement en analyse. Daarnaast heeft het ontwikkelen van alles het internet te bieden
                            heeft
                            geen geheimen voor ons.
                            Aangevuld met expertise op het gebied van “cutting edge” marketing en communicatie, staan wij
                            voor u
                            klaar om uw volgende stap op internet tot een succes te maken.</p>
                    </div>

                    <div class="col-md-5 marginTop20">
                        <img class="imgStyle" src="media/webdev.jpg"
                             alt="een plaatje waar de creativiteit van de website doorschemerd">
                    </div>
                    <div class="col-md-1">

                    </div>

                </div>
            </div>
        </div>

    </div>

</body>
</html>
<?php include 'includes/footer.php'; //geeft de footer mee aan deze pagina
?>