<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/functies.js"></script>
</head>
<body>

<?php include 'header.php';
?>
<div class="containerMain">
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
                    <div class="carousel-caption">
                        <h2>Grasmaaier</h2>
                    </div>
                </div>
                <div class="item">
                    <!-- Set the second background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('media/fauteuil.jpg');"></div>
                    <div class="carousel-caption">
                        <h2>Fauteuil</h2>
                    </div>
                </div>
                <div class="item">
                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('media/laptop.png');"></div>
                    <div class="carousel-caption">
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

        </div>
        <div class="container marginTop20 radius">
            <div class="col-md-12 " align="center">
                <h1 class="textDarkGray">Aanbevolen voor jou</h1>
            </div>
        </div>
        <div class="container marginTop10">
            <a href="productpagina.php">
                <div class="col-md-3 itemBox grow" align="center">
                    <!-- img moet ook uit de database te halen zijn -->
                    <img class="imgStyle" src="media/<?php
                    $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?>" width="200" height="200"/>
                    <h4><a href="productpagina.php"><?php
                            $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                echo $row[0];
                            }
                            ?></a></h4>
                    <div class="description marginTop5"><?php
                        $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></div>
                    <a href="productpagina.php" class="btn btn-default" role="button">Bieden</a>
                </div>
            </a>

            <a href="productpagina.php">
                <div class="col-md-3 itemBox grow" align="center">
                    <img class="imgStyle" src="media/grasmaaier.JPG">
                    <h4><a href="productpagina.php">Grasmaaier</a></h4>
                    <div class="description marginTop5">Deze prachtige machine is milieuvriendelijk, energiezuinig en bijna
                        100% efficiënt.
                    </div>
                    <a href="productpagina.php" class="btn btn-default" role="button">Bieden</a>
                </div>
            </a>
            <a href="productpagina.php">
                <div class="col-md-3 itemBox grow" align="center">
                    <img class="imgStyle" src="media/fauteuil.jpg">
                    <h4><a href="productpagina.php">Fauteuil</a></h4>
                    <div class="description marginTop5">
                        Deze leuke stoel het met zijn bekleding in antraciet en het metalen onderstel een hippe industriële
                        look.
                    </div>
                    <a href="productpagina.php" class="btn btn-default" role="button">Bieden</a>
                </div>
            </a>
            <a href="productpagina.php">
                <div class="col-md-3 itemBox grow" align="center">
                    <img class="imgStyle" src="media/iphone.jpg">
                    <h4><a href="productpagina.php">iPhone SE</a></h4>
                    <div class="description marginTop5">
                        Maak kennis met iPhone SE, de krachtigste 4‑inch telefoon ooit.
                    </div>
                    <a href="productpagina.php" class="btn btn-default" role="button">Bieden</a>
                </div>
            </a>
        </div>
        <div class="container marginTop60 radius">
            <div class="col-md-12 " align="center">
                <h1 class="textDarkGray">Nieuwe veilingen</h1>
            </div>
        </div>
        <div class="container marginTop10">
            <a href="productpagina.php">
                <div class="col-md-3 itemBox grow" align="center">
                    <img class="imgStyle" src="media/<?php
                    $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?>"/>
                    <h4><a href="productpagina.php"><?php
                            $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                echo $row[0];
                            }
                            ?></a></h4>
                    <div class="description marginTop5"><?php
                        $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></div>
                    <a href="productpagina.php" class="btn btn-default" role="button">Bieden</a>
                </div>
            </a>

            <a href="productpagina.php">
                <div class="col-md-3 itemBox grow" align="center">
                    <img class="imgStyle" src="media/grasmaaier.JPG">
                    <h4><a href="productpagina.php">Grasmaaier</a></h4>
                    <div class="description marginTop5">Deze prachtige machine is milieuvriendelijk, energiezuinig en bijna
                        100% efficiënt.
                    </div>
                    <a href="productpagina.php" class="btn btn-default" role="button">Bieden</a>
                </div>
            </a>
            <a href="productpagina.php">
                <div class="col-md-3 itemBox grow" align="center">
                    <img class="imgStyle" src="media/fauteuil.jpg">
                    <h4><a href="productpagina.php">Fauteuil</a></h4>
                    <div class="description marginTop5">
                        Deze leuke stoel het met zijn bekleding in antraciet en het metalen onderstel een hippe industriële
                        look.
                    </div>
                    <a href="productpagina.php" class="btn btn-default" role="button">Bieden</a>
                </div>
            </a>
            <a href="productpagina.php">
                <div class="col-md-3 itemBox grow" align="center">
                    <img class="imgStyle" src="media/iphone.jpg">
                    <h4><a href="productpagina.php">iPhone SE</a></h4>
                    <div class="description marginTop5">
                        Maak kennis met iPhone SE, de krachtigste 4‑inch telefoon ooit.
                    </div>
                    <a href="productpagina.php" class="btn btn-default" role="button">Bieden</a>
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

</div>

</body>
</html>
<?php include 'footer.php';
?>