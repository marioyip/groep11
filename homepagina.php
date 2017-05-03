<?php include 'header.html';
?>
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
                <div class="fill" style="background-image:url('media/laptop.JPG');"></div>
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
            <h1>Aanbevolen items</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-md-4" align="center">
            <h1>Aanbevolen items</h1>
        </div>
        <div class="col-md-4" align="center">
            <h1>Aanbevolen items</h1>
        </div>
        <div class="col-md-4" align="center">
            <h1>Aanbevolen items</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-md-4" align="center">
            <h1>Aanbevolen items</h1>
        </div>
        <div class="col-md-4" align="center">
            <h1>Aanbevolen items</h1>
        </div>
        <div class="col-md-4" align="center">
            <h1>Aanbevolen items</h1>
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