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

$sql = "SELECT VeilingGesloten FROM Voorwerp WHERE voorwerp.voorwerpnummer = 101";
$stmt = $db->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $veilinggesloten = $row[0];

    if ($veilinggesloten == 1) {
        $veiling .= "gesloten";
    }
    if ($veilinggesloten == 0) {
        $veiling .= "geopend";
    }
}

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header"><!-- titel -->
                <?php
                $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
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
                    $sql = "SELECT VoorwerpCover FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?>');"></div>
                </div>
                <div class="item">
                    <!-- Set the second background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('media/<?php
                    $sql = "SELECT VoorwerpCover FROM Voorwerp WHERE Voorwerpnummer = 115";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?>');');"></div>
                </div>
                <div class="item">
                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('media/<?php
                    $sql = "SELECT VoorwerpCover FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
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
                $sql = "SELECT LooptijdbeginDag FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>
                om <!-- LooptijdbeginTijdstip -->
                <?php
                $sql = "SELECT LooptijdbeginTijdstip FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>
                geopend.
                De veiling is op
                <?php
                $sql = "SELECT LooptijdeindeDag FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>
                om
                <?php
                $sql = "SELECT LooptijdeindeTijdstip FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>
                gesloten.
                De looptijd voor de veiling van
                <?php
                $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
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
                    document.getElementById("demo").innerHTML = days + " Dagen "
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
            $sql = "SELECT Startprijs FROM Voorwerp WHERE Voorwerpnummer = 101";
            $stmt = $db->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                echo $row[0];
            }
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
                            $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 101";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                echo $row[0];
                            }
                            ?>
                        </p>
                    </div>
                    <div id="menu1" class="tab-pane">
                        <p class="sanchez marginTop20 fontSize20"><!-- beschrijving -->
                            <?php
                            $sql = "SELECT Betalingsinstructie FROM Voorwerp WHERE Voorwerpnummer = 101";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                echo $row[0];
                            }
                            ?>
                        </p>
                    </div>
                    <div id="menu2" class="tab-pane">
                        <h3>Locatie</h3>
                        <p>Het product wordt verkocht vanuit: <!-- plaatsnaam -->
                            <?php
                            $sql = "SELECT Plaatsnaam FROM Voorwerp WHERE Voorwerpnummer = 101";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                echo $row[0];
                            }
                            ?>,<!-- land -->
                            <?php
                            $sql = "SELECT Land FROM Voorwerp WHERE Voorwerpnummer = 101";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                echo $row[0];
                            }
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


