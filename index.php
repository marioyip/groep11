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
<?php
session_start();

include 'includes/header.php'; // Geeft de header mee aan de index.php pagina
include 'includes/catbar.php'; // Geeft de catbar.php mee aan de index pagina

$sql = "UPDATE Voorwerp SET TimeTeller = Timeteller+1 WHERE EmailVerzonden != 1";
$stmt = $db->prepare($sql);
$stmt->execute();


$sql = "SELECT TOP 1 TimeTeller FROM Voorwerp WHERE EmailVerzonden != 1";
$stmt = $db->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $timeTeller = $row[0];
}
if ($timeTeller % 5 == 0) {

    //voor de email naar de koper
    $sql = "SELECT email, koper, Voorwerpnummer, Titel FROM gebruiker innner JOIN voorwerp ON Gebruikersnaam = Koper WHERE VeilingGesloten = 1";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $email[] = $row[0];
        $kopert[] = $row[1];
        $nrVerkocht[] = $row[2];
        $Titel[] = $row[3];
    }

    if (!empty($email)) {
        for ($j = 0; $j < count($kopert); $j++) {
            $sql = "update voorwerp set emailverzonden = 1 where koper ='$kopert[$j]' AND Voorwerpnummer = $nrVerkocht[$j] AND VeilingGesloten = 1";
            $stmt = $db->prepare($sql);
            $stmt->execute();
        }

        for ($i = 0; $i < count($email); $i++) {
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: EenmaalAndermaal Veiling
            <EenmaalAndermaal@iConcepts.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $onderwerp = 'U heeft ' . $Titel[$i] . ' Gewonnen op EenmaalAndermaal' . "\r\n";
            $bericht = 'Van harte gefeliciteerd met het winnen van ' . $Titel[$i] . '' . "\r\n";
            $bericht .= 'Wij van EenmaalAndermaal hopen dat u van dit product geniet' . "\r\n";
            $bericht .= 'U bent verplicht om te betalen)' . "\r\n;" . ' EenmaalAndermaal';
            mail($email[$i], $onderwerp, $bericht, $headers);
        }
    }
}
    /**
     * Berekent de tijd tot een veiling is afgelopen
     *
     * @param $tijd : De aflooptijd van een product
     * @param $pos : De positie (div) op de pagina waar de tijd moet worden geplaatst
     */
function getTijd($tijd, $pos)
{
    ?>
    <script>
        var countDownDate<?php echo $pos ?> = new Date("<?php echo $tijd ?>").getTime();
        var x = setInterval(function () {
            var now = new Date().getTime();
            var verschil = countDownDate<?php echo $pos ?> - now;


            var days = Math.floor(verschil / (1000 * 60 * 60 * 24));
            var hours = Math.floor((verschil % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((verschil % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((verschil % (1000 * 60)) / 1000);

            if (verschil <= 0) {
                clearInterval(x);
                document.getElementById("<?php echo $pos ?>").innerHTML = "Helaas, de veiling is afgelopen!   ";
            } else {
                document.getElementById("<?php echo $pos ?>").innerHTML = days + " dagen " + hours + " uur " + minutes + " minuten en " + seconds + " seconden";
            }
        }, 1);
    </script>
<?php
}

?>

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
            //Selecteert 3 willekeurige producten voor in de carousel
            $sql = "SELECT TOP 3 Beschrijving, Titel, Voorwerpnummer, VoorwerpCover, LooptijdeindeDag, LooptijdeindeTijdstip FROM Voorwerp WHERE VeilingGesloten = 0 ORDER BY NEWID()";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            while ($carouselRow = $stmt->fetch(PDO::FETCH_NUM)) {
                $carouselBeschrijving[] = $carouselRow[0];
                $carouselTitel[] = $carouselRow[1];
                $carouselNummer[] = $carouselRow[2];
                $carouselCover[] = $carouselRow[3];
                $carouselEindDag[] = $carouselRow[4];
                $carouselEindTijd[] = $carouselRow[5];
            }
            ?>

            <!-- Wrapper for Slides -->
            <div class="carousel-inner">
                <!-- Set the first background image using inline CSS below. -->
                <?php
                for ($i = 0; $i < count($carouselTitel); $i++) {
                    if ($i == 0) {
                        echo '<div class="item active">';
                    } else {
                        echo '<div class="item">';
                    }
                    echo "<div class=\"fill\" style=\"background-image:url('" . $carouselCover[$i] . "')\"></div>";
                    echo '<div class="carousel-caption d-none d-md-block"><h3>';
                    echo $carouselTitel[$i] . '</h3><p></p>';
                    echo '<div id="carousel' . $i . '" class="h2"></div>';
                    getTijd($carouselEindDag[$i] . ' ' . $carouselEindTijd[$i], "carousel" . $i);
                    echo '<a href = "productpagina.php?product=' . $carouselNummer[$i] . '" class="btn btn-ibis crete" role = "button">Bieden</a>';
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

        <div class="container marginTop40" align="center">
            <div class="col-md-4">
                <p class="textDarkGray bold "><span class="glyphicon glyphicon-ok textGreen "></span>
                    10.000 veilingen per dag
                </p>
            </div>
            <div class="col-md-4">
                <p class="textDarkGray bold "><span class="glyphicon glyphicon-ok textGreen"></span>
                    Al 5.000
                    gewonnen veilingen
                </p>
            </div>
            <div class="col-md-4" id="wrapper">
                <p class="textDarkGray bold "><span class="glyphicon glyphicon-ok textGreen"></span>
                    Onze klantenservice staat voor je klaar</p>
            </div>
        </div>
        <div class="container marginTop20">
            <hr>
            <div class="col-md-12 " align="center">
                <h2 class="textDarkGray">Bijna afgelopen</h2>
            </div>
        </div>
        <div class="container">
            <?php
            //Selecteert de 4 snelst aflopende veilingen
            $sql = "SELECT TOP 4 * FROM Voorwerp WHERE VeilingGesloten = 0 ORDER BY LooptijdeindeDag ASC, LooptijdeindeTijdstip ASC";
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
                        <img class="imgStyle roundborder" src="' . $VoorwerpCover[$i] . '"/>
                        <h4><a class="textDarkGray" href="productpagina.php?product=' . $Voorwerpnummer[$i] . '">
                        ' . $Titel[$i] . '</a></h4>
                        <div class="description">  
                        </div>
                        <div id="boven' . $i . '" class="description"></div>';
                    getTijd($LooptijdeindeDag[$i] . ' ' . $LooptijdeindeTijdstip[$i], "boven" . $i);
                    echo '
                        <a href="productpagina.php?product=' . $Voorwerpnummer[$i] . '" class="btn btn-ibis crete" role="button">Bieden</a>
                    </div>
                </a>
            ';
                }

                ?>
            </div>

            <div class="container marginTop20">
                <div class="col-md-12 " align="center">
                    <h2 class="textDarkGray">Nieuwe veilingen</h2>
                </div>
            </div>
            <?php
            //Selecteert de 4 nieuwste veilingen
            $sql2 = "SELECT TOP 4 * FROM Voorwerp WHERE VeilingGesloten = 0 ORDER BY LooptijdbeginDag DESC, LooptijdbeginTijdstip DESC";
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
                        <img class="imgStyle roundborder" src="' . $VoorwerpCover2[$i] . '"/>
                        <h4><a class="textDarkGray" href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '">
                        ' . $Titel2[$i] . '</a></h4>
                        <div class="description">
                        </div>
                        <div id="onder' . $i . '" class="description"></div>';
                    getTijd($LooptijdeindeDag2[$i] . ' ' . $LooptijdeindeTijdstip2[$i], "onder" . $i);
                    echo '
                        <a href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '" class="btn btn-ibis crete" role="button">Bieden</a>
                    </div>
                </a>
            ';
                }
                ?>
            </div>

            <div class="container marginTop60" align="center">
                <div class="col-md-12">
                    <a href="resultatenpagina.php?rubriek=-1" class="btn btn-ibis crete" role="button">Bekijk alle
                        rubrieken</a>
                </div>
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