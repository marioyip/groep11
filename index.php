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



<?php include 'header.php'; // Geeft de header mee aan de index.php pagina

include 'catbar.php'; ?> <!-- Geeft de catbar.php mee aan de index pagina -->

<main>
    <!-- Full Page Image Background Carousel Header -->
    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('media/<?php
                $sql = "SELECT VoorwerpCover FROM Voorwerp WHERE Voorwerpnummer = 6";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>');"></div>
                <div class="carousel-caption d-none d-md-block">
                    <h3><?php
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 6";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></h3>
                    <p><?php
                        $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 6";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></p>
<!--                    <button href="productpagina.php?product=115" class="btn marginBottom20 ttbtn-hero btn-lg textDarkGray" role="button">Bied nu</button>-->
                    <a href="productpagina.php?product=1" class="btn btn-default crete" role="button">Bieden</a>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('media/fauteuil.jpg');"></div>
                <div class="carousel-caption d-none d-md-block">
                    <h3><?php
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 2";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></h3>
                    <p><?php
                        $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 2";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></p>
<!--                    <button href="productpagina.php?product=115" class="backgroundIbisRed marginBottom20 btn btn-lg textDarkGray" role="button">Bied nu!</button>-->
                    <a href="productpagina.php?product=2" class="btn btn-default crete" role="button">Bieden</a>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->

                <div class="fill" style="background-image:url('media/laptop.png');"></div>

                <div class="carousel-caption d-none d-md-block">
                    <!-- Query voor het zien van de Titel van een bepaald voorwerp -->
                    <h2><?php
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 3";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></h2>
                    <p>
                        <?php
                        $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 3";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?>
                    </p>
<!--                    <button href="productpagina.php?product=101" class="btn btn-lg marginBottom20 backgroundIbisRed textDarkGray" role="button">Bied nu</button>-->
                    <a href="productpagina.php?product=3" class="btn btn-default crete" role="button">Bieden</a>
                </div>
            </div>
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
    <div class="container marginTop20">
        <div class="col-md-12 " align="center">
            <h1 class="textDarkGray">Aanbevolen voor jou</h1>
        </div>
    </div>
    <div class="container">
        <a href="productpagina.php?product=1">
            <!-- laptop -->
            <div class="col-md-3 itemBox roundborder" align="center">
                <!-- img moet ook uit de database te halen zijn -->
                <img class="imgStyle roundborder" alt="Voorwerpcover" src="media/<?php
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 1";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>" width="200" height="200"/>
                <!-- Haalt de titel uit de database van een bepaald voorwerp -->
                <h4><a class="textDarkGray" href="productpagina.php?product=1"><?php
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 1";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description">
                    <!-- Haalt de beschrijving uit de database van een bepaald voorwerp -->
                    <?php
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 1";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php?product=1" class="btn btn-default crete" role="button">Bieden</a>
            </div>
        </a>
        <!-- grasmaaier -->
        <a href="productpagina.php?product=2">
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 2";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>" width="200" height="200"/>
                <!-- Haalt de titel uit de database van een bepaald voorwerp -->
                <h4><a class="textDarkGray" href="productpagina.php?product=2"><?php
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 2";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description">
                    <!-- Haalt de beschrijving uit de database van een bepaald voorwerp -->
                    <?php
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 2";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php?product=2" class="btn btn-default crete" role="button">Bieden</a>
            </div>
        </a>
        <!-- fauleuil -->
        <a href="productpagina.php?product=3">
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 3";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>" width="200" height="200"/>
                <!-- Haalt de titel uit de database van een bepaald voorwerp -->
                <h4><a class="textDarkGray" href="productpagina.php?product=3"><?php
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 3";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description">
                    <!-- Haalt de beschrijving uit de database van een bepaald voorwerp -->
                    <?php
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 3";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php?product=3" class="btn btn-default crete" role="button">Bieden</a>
            </div>
        </a>
        <!-- iphone -->
        <a href="productpagina.php?product=3">
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 3";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>" width="200" height="200"/>
                <!-- Haalt de titel uit de database van een bepaald voorwerp -->
                <h4><a class="textDarkGray" href="productpagina.php?product=3"><?php
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 3";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description">
                    <!-- Haalt de beschrijving uit de database van een bepaald voorwerp -->
                    <?php
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 3";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php?product=3" class="btn btn-default crete" role="button">Bieden</a>
            </div>
        </a>
    </div>
    <div class="container marginTop60">
        <div class="col-md-12 " align="center">
            <h1 class="textDarkGray">Nieuwe veilingen</h1>
        </div>
    </div>
    <div class="container">
        <a href="productpagina.php?product=3">
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                //                    Haalt de voorwerpcover, dus het plaatje uit de database en toont deze
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 1";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>"/>
                <h4><a class="textDarkGray" href="productpagina.php?product=3"><?php
                        //Haalt de titel uit de database
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 1";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description"><?php
                    //Haalt de beschrijving uit de database
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 1";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php?product=3" class="btn btn-default crete" role="button">Bieden</a>
            </div>
        </a>

        <a href="productpagina.php?product=1">
            <div class="col-md-3 itemBox roundborder" align="center">
                <img class="imgStyle roundborder" src="media/grasmaaier.jpg">
                <h4><a class="textDarkGray" href="productpagina.php?product=1">Grasmaaier</a></h4>
                <div class="description">Deze prachtige machine is milieuvriendelijk, energiezuinig en bijna
                    100% efficiënt.
                </div>
                <a href="productpagina.php?product=1" class="btn btn-default crete" role="button">Bieden</a>
            </div>
        </a>
        <a href="productpagina.php?product=1">
            <div class="col-md-3 itemBox roundborder" align="center">
                <img class="imgStyle roundborder" src="media/fauteuil.jpg">
                <h4><a class="textDarkGray" href="productpagina.php?product=1">Fauteuil</a></h4>
                <div class="description">
                    Deze leuke stoel het met zijn bekleding in antraciet en het metalen onderstel een hippe industriële
                    look.
                </div>
                <a href="productpagina.php?product=1" class="btn btn-default crete" role="button">Bieden</a>
            </div>
        </a>
        <a href="productpagina.php?product=1">
            <div class="col-md-3 itemBox  roundborder x" align="center">
                <img class="imgStyle roundborder " src="media/iphone.jpg">
                <h4><a class="textDarkGray " href="productpagina.php?product=1">iPhone SE</a></h4>
                <div class="description ">
                    Maak kennis met iPhone SE, de krachtigste 4‑inch telefoon ooit.
                </div>
                <a href="productpagina.php?product=1" class="btn btn-default crete" role="button">Bieden</a>
            </div>
        </a>
    </div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
    </script>
</main>
<?php include 'footer.php';
?>

</body>
</html>
