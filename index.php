<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"><!--  Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"><!--  Bootstrap CSS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png"> <!-- Tabblad icoontje -->
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet"> <!-- Crete Round Font van Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Sanchez" rel="stylesheet"><!-- Sanchez Font van Google Fonts -->
</head>
<body>

<?php include 'header.php'; // Geeft de header mee aan de index.php pagina

include 'catbar.php';?> <!-- Geeft de catbar.php mee aan de index pagina -->

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
                <div class="fill" style="background-image:url('media/grasmaaier.JPG');"></div>
                <div class="carousel-caption crete">
                    <h2>Grasmaaier</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('media/fauteuil.jpg');"></div>
                <div class="carousel-caption crete">
                    <h2>Fauteuil</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('media/laptop.png');"></div>
                <div class="carousel-caption crete">
                    <!-- Query voor het zien van de Titel van een bepaald voorwerp -->
                    <h2><?php
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></h2>
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
        <div>

        </div>
        <div class="container marginTop20">
            <div class="col-md-12 " align="center">
                <h1 class="textDarkGray">Aanbevolen voor jou</h1>
            </div>
        </div>
        <div class="container">
                <!-- laptop id = 101-->
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                $voorwerpnummer = 101;

                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>" width="200" height="200"/>
                <!-- Haalt de titel uit de database van een bepaald voorwerp -->
                <h4 class="textDarkGray"><?php
                    $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></h4>
                <div class="description">
                    <!-- Haalt de beschrijving uit de database van een bepaald voorwerp -->
                    <?php

                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <form method="get" action="productpagina.php">
                    <input type="hidden" name="productId" value="<?php echo $voorwerpnummer; ?>">
                    <input type="submit" class="btn btn-default" value="Bieden">
                    <!--                    <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>-->
                </form>
            </div>

            <!-- grasmaaier id = 115-->
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                $voorwerpnummer = 115;

                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>" width="200" height="200"/>
                <!-- Haalt de titel uit de database van een bepaald voorwerp -->
                <h4 class="textDarkGray"><?php
                    $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></h4>
                <div class="description">
                    <!-- Haalt de beschrijving uit de database van een bepaald voorwerp -->
                    <?php

                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <form method="get" action="productpagina.php">
                    <input type="hidden" name="productId" value="<?php echo $voorwerpnummer; ?>">
                    <input type="submit" class="btn btn-default" value="Bieden">
                    <!--                    <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>-->
                </form>
            </div>

            <!-- fauleuil id=117 -->
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                $voorwerpnummer = 117;

                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>" width="200" height="200"/>
                <!-- Haalt de titel uit de database van een bepaald voorwerp -->
                <h4 class="textDarkGray"><?php
                    $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></h4>
                <div class="description">
                    <!-- Haalt de beschrijving uit de database van een bepaald voorwerp -->
                    <?php

                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <form method="get" action="productpagina.php">
                    <input type="hidden" name="productId" value="<?php echo $voorwerpnummer; ?>">
                    <input type="submit" class="btn btn-default" value="Bieden">
                    <!--                    <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>-->
                </form>
            </div>

            <!-- iphone id = 118-->
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                $voorwerpnummer = 118;

                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>" width="200" height="200"/>
                <!-- Haalt de titel uit de database van een bepaald voorwerp -->
                <h4 class="textDarkGray"><?php
                    $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></h4>
                <div class="description">
                    <!-- Haalt de beschrijving uit de database van een bepaald voorwerp -->
                    <?php

                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <form method="get" action="productpagina.php">
                    <input type="hidden" name="productId" value="<?php echo $voorwerpnummer; ?>">
                    <input type="submit" class="btn btn-default" value="Bieden">
                    <!--                    <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>-->
                </form>
            </div>
        </div>
        <div class="container marginTop60">
            <div class="col-md-12 " align="center">
                <h1 class="textDarkGray">Nieuwe veilingen</h1>
            </div>
        </div>
        <div class="container">
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                $voorwerpnummer = 101;

                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>" width="200" height="200"/>
                <!-- Haalt de titel uit de database van een bepaald voorwerp -->
                <h4 class="textDarkGray"><?php
                    $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></h4>
                <div class="description">
                    <!-- Haalt de beschrijving uit de database van een bepaald voorwerp -->
                    <?php

                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <form method="get" action="productpagina.php">
                    <input type="hidden" name="productId" value="<?php echo $voorwerpnummer; ?>">
                    <input type="submit" class="btn btn-default" value="Bieden">
                    <!--                    <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>-->
                </form>
            </div>

            <!-- grasmaaier id = 115-->
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                $voorwerpnummer = 115;

                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>" width="200" height="200"/>
                <!-- Haalt de titel uit de database van een bepaald voorwerp -->
                <h4 class="textDarkGray"><?php
                    $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></h4>
                <div class="description">
                    <!-- Haalt de beschrijving uit de database van een bepaald voorwerp -->
                    <?php

                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <form method="get" action="productpagina.php">
                    <input type="hidden" name="productId" value="<?php echo $voorwerpnummer; ?>">
                    <input type="submit" class="btn btn-default" value="Bieden">
                    <!--                    <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>-->
                </form>
            </div>

            <!-- fauleuil id=117 -->
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                $voorwerpnummer = 117;

                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>" width="200" height="200"/>
                <!-- Haalt de titel uit de database van een bepaald voorwerp -->
                <h4 class="textDarkGray"><?php
                    $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></h4>
                <div class="description">
                    <!-- Haalt de beschrijving uit de database van een bepaald voorwerp -->
                    <?php

                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <form method="get" action="productpagina.php">
                    <input type="hidden" name="productId" value="<?php echo $voorwerpnummer; ?>">
                    <input type="submit" class="btn btn-default" value="Bieden">
                    <!--                    <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>-->
                </form>
            </div>

            <!-- iphone id = 118-->
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                $voorwerpnummer = 118;

                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>" width="200" height="200"/>
                <!-- Haalt de titel uit de database van een bepaald voorwerp -->
                <h4 class="textDarkGray"><?php
                    $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></h4>
                <div class="description">
                    <!-- Haalt de beschrijving uit de database van een bepaald voorwerp -->
                    <?php

                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = $voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <form method="get" action="productpagina.php">
                    <input type="hidden" name="productId" value="<?php echo $voorwerpnummer; ?>">
                    <input type="submit" class="btn btn-default" value="Bieden">
                    <!--                    <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>-->
                </form>
            </div>
        </div>


        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            $('.carousel').carousel({
                interval: 5000 //changes the speed
            })
        </script>


</body>
</html>
<?php include 'footer.php';
?>