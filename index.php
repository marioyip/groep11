<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--  Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!--  Bootstrap CSS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png"> <!-- Tabblad icoontje -->
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
    <!-- Crete Round Font van Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Sanchez" rel="stylesheet"><!-- Sanchez Font van Google Fonts -->
</head>
<body>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("May 27, 2017 13:25:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {

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
            + minutes + " Minuten en " + seconds + " Seconden om te bieden!";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>


<?php
session_start();

include 'includes/header.php'; // Geeft de header mee aan de index.php pagina
include 'includes/catbar.php'; // Geeft de catbar.php mee aan de index pagina ?>

<main>
    <!-- Full Page Image Background Carousel Header -->
    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <?php
        $sql = "SELECT TOP 3 Beschrijving, Titel, Voorwerpnummer, VoorwerpCover FROM Voorwerp ORDER BY NEWID()";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $Beschrijving[] = $row[0];
            $Titel[] = $row[1];
            $Voorwerpnummer[] = $row[2];
            $cover[] = $row[3];
        }
        ?>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <!-- Set the first background image using inline CSS below. -->
            <?php
            for ($i = 0; $i < count($Titel); $i++) {
                if ($i == 0) {
                    echo '<div class="item active">';
                } else {
                    echo '<div class="item">';
                }
                echo "<div class=\"fill\" style=\"background-image:url('media/" . $cover[$i] . "')\"></div>";
                echo '<div class="carousel-caption d-none d-md-block"><h3>';
                echo $Titel[$i] . '</h3><p>' . $Beschrijving[$i] . '</p>';
                echo '<a href = "productpagina.php?product=' . $Voorwerpnummer[$i] . '" class="btn btn-default crete" role = "button">Bieden</a>';
                echo '</div></div>';
            }
            ?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>

    </div>


    </div>
    <div class="container marginTop20">
        <div class="col-md-12 " align="center">
            <h1 class="textDarkGray">Schone artikeltjes</h1>
        </div>
    </div>
    <div class="container">
        <!-- PHP voor laatste veilingen heeuj feessie veel plezier met lezen -->
        <?php
        $sql = "SELECT TOP 4 * FROM Voorwerp";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $Looptijd[] = $row[0];
            $LooptijdbeginDag[] = $row[1];
            $LooptijdbeginTijdstip[] = $row[2];
            $LooptijdeindeDag[] = $row[3];
            $LooptijdeindeTijdstip[] = $row[4];
            $Startprijs[] = $row[5];
            $Verkoper[] = $row[6];
            $Koper[] = $row[7];
            $Verzendkosten[] = $row[8];
            $Verkoopprijs[] = $row[9];
            $Beschrijving[] = $row[10];
            $Betalingswijze[] = $row[11];
            $Betalingsinstructie[] = $row[12];
            $Land[] = $row[13];
            $Plaatsnaam[] = $row[14];
            $Titel[] = $row[15];
            $Verzendinstructies[] = $row[16];
            $Voorwerpnummer[] = $row[17];
            $VeilingGesloten[] = $row[18];
            $VoorwerpCover[] = $row[19];
        }
        ?>

        <div class="container">
            <?php
            for ($i = 0; $i < 4; $i++) {
                echo '
                <a href="productpagina.php?product=' . $Voorwerpnummer[$i] . '">
                    <div class="col-md-3 itemBox roundborder " align="center">
                        <img class="imgStyle roundborder" src="media/' . $VoorwerpCover[$i] . '"/>
                        <h4><a class="textDarkGray" href="productpagina.php?product=' . $Voorwerpnummer[$i] . '">
                        ' . $Titel[$i] . '</a></h4>
                        <div class="description">
                        ' . $Beschrijving[$i] . '
                        </div>
                        <a href="productpagina.php?product=' . $Voorwerpnummer[$i] . '" class="btn btn-default crete" role="button">Bieden</a>
                    </div>
                </a>
            ';
            }

            ?>
        </div>
        <div class="container marginTop60">
            <div class="col-md-12 " align="center">
                <h1 class="textDarkGray">Nieuwe veilingen</h1>
            </div>
        </div>

        <!-- PHP voor laatste veilingen heeuj feessie veel plezier met lezen -->
        <?php
        $sql2 = "SELECT TOP 4 * FROM Voorwerp ORDER BY LooptijdbeginDag DESC, LooptijdbeginTijdstip DESC";
        $stmt2 = $db->prepare($sql2);
        $stmt2->execute();
        while ($row2 = $stmt2->fetch(PDO::FETCH_NUM)) {
            $Looptijd2[] = $row2[0];
            $LooptijdbeginDag2[] = $row2[1];
            $LooptijdbeginTijdstip2[] = $row2[2];
            $LooptijdeindeDag2[] = $row2[3];
            $LooptijdeindeTijdstip2[] = $row2[4];
            $Startprijs2[] = $row2[5];
            $Verkoper2[] = $row2[6];
            $Koper2[] = $row2[7];
            $Verzendkosten2[] = $row2[8];
            $Verkoopprijs2[] = $row2[9];
            $Beschrijving2[] = $row2[10];
            $Betalingswijze2[] = $row2[11];
            $Betalingsinstructie2[] = $row2[12];
            $Land2[] = $row2[13];
            $Plaatsnaam2[] = $row2[14];
            $Titel2[] = $row2[15];
            $Verzendinstructies2[] = $row2[16];
            $Voorwerpnummer2[] = $row2[17];
            $VeilingGesloten2[] = $row2[18];
            $VoorwerpCover2[] = $row2[19];
        }
        ?>

        <div class="container">
            <?php
            for ($i = 0; $i < 4; $i++) {
                echo '
                <a href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '">
                    <div class="col-md-3 itemBox roundborder " align="center">
                        <img class="imgStyle roundborder" src="media/' . $VoorwerpCover2[$i] . '"/>
                        <h4><a class="textDarkGray" href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '">
                        ' . $Titel2[$i] . '</a></h4>
                        <div class="description">
                        ' . $Beschrijving2[$i] . '
                        </div>
                        <a href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '" class="btn btn-default crete" role="button">Bieden</a>
                    </div>
                </a>
            ';
            }
            ?>
        </div>


        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            $('.carousel').carousel({
                interval: 5000 //changes the speed
            })
        </script>
</main>
<?php include 'includes/footer.php';
?>

</body>
</html>
