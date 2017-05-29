<!DOCTYPE html>
<main lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Help &amp; Info - Eenmaal Andermaal</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous"> <!--bootstrap css-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
              integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
              crossorigin="anonymous"> <!--bootstrap css-->
        <link rel="stylesheet" href="css/style.css"> <!--eigen css-->
        <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png"> <!--tabblad icoontje-->
    </head>
</main>
<body>

<?php
session_start();
include 'includes/header.php'; //geeft de header mee aan deze pagina
include 'includes/catbar.php'; //geeft de cattegorieën balk mee aan deze pagina
?>

<div class="containerMain">
    <div class="container marginTop20 radius">
        <div class="col-md-12 " align="left">
            <div class="container">
                <!--div plaatst alles wat erin zit links, tenzij anders aangegeven-->
                <div class="col-md-12 " align="center"> <!--div plaatst alles in het midden-->
                    <h1 class="textGreen">Help en info</h1>
                    <hr>
                </div>
            </div>
            <div class="container marginTop10">
                <h3 class="textDarkGray text-center">Profiel</h3>
                <div class="col-md-2">

                </div>
                <div class="col-md-8 text-center marginTop10">
                    <!--vragen en antwoorden die behoren bij de categorie "profiel"-->

                    <h4>Zijn er kosten verbonden aan het maken van een profiel?<br></h4>
                    <p>&#8594; Nee, het maken van een profiel op EenmaalAndermaal is helemaal gratis!<br></p>
                    <h4>Kan ik mijn profiel aanpassen?<br></h4>
                    <p>&#8594;Ja, op de pagina <u>mijn profiel</u> kunt u uw gegevens aanpassen<br></p>
                    <h4>Is er een minimumleeftijd voor het maken van een profiel?<br></h4>
                    <p>&#8594; Ja, de minimumleeftijd om een profiel te maken en te bieden is 18 jaar.<br></p>
                    <h4>Kan ik mijn profiel verwijderen?<br></h4>
                    <p>&#8594;Je kan je profiel helaas niet verwijderen.</p>
                </div>
                <div class="col-md-2">

                </div>
            </div>
            <div class="container marginTop10">
                <h3 class="textDarkGray text-center">Advertenties</h3>
                <div class="col-md-2">

                </div>
                <div class="col-md-8 marginTop10 text-center">
                    <!--vragen en antwoorden die behoren bij de categorie "advertenties plaatsen"-->

                    <h4> Kan ik mijn advertentie verwijderen </h4>
                    <p>&#8594; Ja, op mijn profiel kan je je advertentie verwijderen</p>
                    <h4>Kan ik mijn minimale prijs aanpassen?</h4>
                    <p>&#8594; Ja, op mijn profiel kan je jouw advertenties en beschrijvingen veranderen. </p>
                    <h4>Kan ik de betaling meeteen ontvangen?.</h4>
                    <p>&#8594; Nee, de betalingen word in twee weken betaald, dit verschilt per bank.</p>
                    <h4>Kan ik meerdere advertenties plaatsen?</h4>
                    <p>&#8594; Ja, je kan versschillende advertenties plaatsen.</p>
                </div>
                <div class="col-md-2">

                </div>
            </div>
            <div class="container marginTop10">
                <h3 class="textDarkGray text-center">Verwijderen</h3>
                <div class="col-md-2">

                </div>
                <div class="col-md-8 text-center marginTop30">

                    <h4>Hoe verwijder ik een advertentie?</h4>
                    <p>
                        <!--geordende lijst met informatie over het inloggen-->
                        <ol>
                            <li>Log in op EenmaalAndermaal.</li>
                            <li>Ga via Mijn profiel naar je advertenties.</li>
                            <li> Gebruik je de app, open dan de betreffende advertentie en klik op Verwijder
                                advertentie.
                            </li>
                            <li>Wil je via de website je advertentie verwijderen, dan selecteer je de advertentie(s) die
                                je
                                wilt verwijderen. Klik het vierkantje aan dat voor de foto staat en klik daarna op
                                Verwijder.
                            </li>
                            <li>Voordat we de advertentie verwijderen, vragen we je om aan te geven of je het product
                                via
                                Marktplaats hebt verkocht.
                            </li>
                        </ol>
                    </p>
                </div>
                <div class="col-md-2">

                </div>
            </div>
            <div class="container marginTop10">
                <h3 class="textDarkGray text-center"> Bieden</h3>
                <div class="col-md-2">

                </div>
                <div class="col-md-8 text-center marginTop30">
                    <!--geordende lijst met informatie over het bieden-->

                    <h4>Hoe bied ik op een advertentie?</h4>
                    <p>
                        <ol>
                            <li>Log in op EenmaalAndermaal.</li>
                            <li>Klik op een veiling</li>
                            <li>Biedt op een product.
                            </li>
                            <li>Wacht tot de veilingtijd is verlopen.
                            </li>
                            <li>Als je de veiling gewonnen hebt, betaal je het bedrag.
                            </li>
                        </ol>
                    </p>
                </div>
                <div class="col-md-2">

                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include 'includes/footer.php'; //geeft de footer mee aan deze pagina
?>