<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eenmaal Andermaal</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/homepagina.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand wit" href="#">Logo</a>
        </div>
        <div id="navbar">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="categorieën.php">Categorieën</a>
                </li>
            </ul>
            <form class="navbar-form navbar-left" action="zoeken.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Zoeken">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="inlgogen.php">Inloggen</a>
                </li>
                <li>
                    <a href="registreren.php">Registreren</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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
            <div class="fill" style="background-image:url('media/grasmaaier.jpg');"></div>
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
            <div class="fill" style="background-image:url('media/laptop.jpg');"></div>
            <div class="carousel-caption">
                <h2>Laptop</h2>
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
<div class="container">
    <div class="col-md-12" align="center">
        <h1>Aanbevolen voor jou</h1>
    </div>

    </div>
</div>
<div class="container">

    <div class="col-md-4">
        <h1>Voorbeeld 1</h1>
    </div>
    <div class="col-md-4">
        <h1>Voorbeeld 2</h1>
    </div>
    <div class="col-md-4">
        <h1>Voorbeeld 3</h1>
    </div>
</div>
<div class="container">
    <div class="col-md-4">
        <h1>Voorbeeld 1</h1>
    </div>
    <div class="col-md-4">
        <h1>Voorbeeld 2</h1>
    </div>
    <div class="col-md-4">
        <h1>Voorbeeld 3</h1>
    </div>
</div>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>


<?php include 'footer.php';
?>