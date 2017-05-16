<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Productpagina - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<?php

include 'header.php';
include 'catbar.php';

ini_set('display_errors', 1);
require_once('functies.php');

connectToDatabase();

$veiling = "";
$veilinggesloten = "";

if(isset($_GET['product'])){
    $product = $_GET['product'];
    $sql = "SELECT * FROM voorwerp WHERE voorwerp.voorwerpnummer = '$product'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $Looptijd				= $row[0];
    $LooptijdbeginDag		= $row[1];
    $LooptijdbeginTijdstip	= $row[2];
    $LooptijdeindeDag		= $row[3];
    $LooptijdeindeTijdstip	= $row[4];
    $Startprijs				= $row[5];
    $Verkoper				= $row[6];
    $Koper					= $row[7];
    $Verzendkosten			= $row[8];
    $Verkoopprijs			= $row[9];
    $Beschrijving			= $row[10];
    $Betalingswijze			= $row[11];
    $Betalingsinstructie	= $row[12];
    $Land					= $row[13];
    $Plaatsnaam				= $row[14];
    $Titel					= $row[15];
    $Verzendinstructies		= $row[16];
    $Voorwerpnummer			= $row[17];
    $VeilingGesloten		= $row[18];
    $VoorwerpCover          = $row[19];
}
//while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
//    $veilinggesloten = $row[0];
//
//    if ($veilinggesloten == 1) {
//        $veiling .= "gesloten";
//    }
//    if ($veilinggesloten == 0) {
//        $veiling .= "geopend";
//    }
//}

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header"><!-- titel -->
                <?php
                echo $Titel;
                ?>
            </h1>
        </div>
    </div>

</div>

<div class="container marginTop20">
    <div class="col-md-6">
        <div id="myCarousel" class="carousel slide ">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <!-- Wrapper for Slides -->
            <div class="carousel-inner ">
                <div class="item active">
                    <!-- Set the first background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('media/<?php
                    echo $VoorwerpCover;
                    ?>');"></div>
                </div>
                <div class="item">
                    <!-- Set the second background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('media/<?php
                    echo $VoorwerpCover;
                    ?>');');"></div>
                </div>
                <div class="item">
                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('media/<?php
                    echo $VoorwerpCover;
                    ?>');');"></div>
                </div>
                <div class="item">
                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('media/default.png');"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="veilingBox">
            <h2>De veiling is <?= $veiling ?></h2>
            <p><!-- looptijdbegindag -->
                De veiling is op
                <?php
                echo $LooptijdbeginDag;
                ?>
                om <!-- LooptijdbeginTijdstip -->
                <?php
                echo $LooptijdbeginTijdstip;
                ?>
                geopend.
                De veiling is op
                <strong><?php
                echo $LooptijdeindeDag;
                ?></strong>
                om
                <strong><?php
                echo $LooptijdeindeTijdstip;
                ?></strong>
                gesloten.
                De looptijd voor de veiling van
                <?php
                echo $Titel;
                ?>
                is <!-- looptijd -->
                <?php
                $sql = "SELECT looptijd FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>
                dagen.

            </p>
            <p>
                <!-- Display the countdown timer in an element -->
            <p class="fontSize20">U heeft nog maar</p>
            <p id="demo" class="fontSize20"></p>

            <script>
                // Set the date we're counting down to
                var countDownDate = new Date("May 27, 2017 13:25:00").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                    // Get todays date and time
                    var now = new Date().getTime();

                    // Find the distance between now an the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds

                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24) + hours + 23);
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Display the result in the element with id="demo"
                    document.getElementById("demo").innerHTML = days + " Uur "
                        + minutes + " Minuten en " + seconds + " Seconden om te bieden!" ;

                    // If the count down is finished, write some text
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("demo").innerHTML = "EXPIRED";
                    }
                }, 1000);
            </script>
            </p>
            <button class="btn-default btn btn-lg textDarkGray" role="button">Bied nu!</button>
            <h2>Huidige prijs: €<?php
            echo $Startprijs;
            ?>
            </h2>
            <h3>
                Door: GEBRUIKER - NIET DYNAMIC
            </h3>
        </div>

    </div>
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 marginTop20">
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Product informatie</a></li>
                    <li><a data-toggle="tab" href="#menu1">Betalingsinstructie</a></li>
                    <li><a data-toggle="tab" href="#menu2">Contact informatie</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane in active">
                        <p class="sanchez marginTop20 fontSize20"><!-- beschrijving -->
                            <?php
                            echo $Beschrijving;
                            ?>
                        </p>
                    </div>
                    <div id="menu1" class="tab-pane">
                        <p class="sanchez marginTop20 fontSize20"><!-- beschrijving -->
                            <?php
                            echo $Betalingsinstructie;
                            ?>
                        </p>
                    </div>
                    <div id="menu2" class="tab-pane">
                        <h3>Locatie</h3>
                        <p>Het product wordt verkocht vanuit: <!-- plaatsnaam -->
                            <?php
                            echo $Plaatsnaam;
                            ?>,<!-- land -->
                            <?php
                            echo $Land;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>

</html>

<?php
include 'footer.php';
?>


