<?php

require_once('functies.php'); //functies.php wordt gebruikt om aan de database te kunnen verbinden
connectToDatabase(); //deze functie verbindt de webpagina aan de database

?>
<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Sanchez" rel="stylesheet">
<body>
<header>
    <div class="container-fluid backgroundGreen crete">
        <div class="navbar-header">
            <a class="navbar-header" href="index.php">
                <img class="logo" src="img/eenmaalandermaallogo.png" alt="logo"/></a> <!--logo-->
            <a class="navbar-header " href="index.php"><img class="logoTekst" src="media/EenmaalAndermaalCreteRound.PNG"
                                                            alt="logo"/></a><!--tekstlogo-->
        </div>
        <div id="navbar">
            <ul class="nav ">
                <li>
                    <a class="navbar-right glyphicon glyphicon-user textWhite fontSize16 crete" aria-hidden="true"
                       href="inloggen.php">Inloggen</a> <!--inloggen knop met een glyphicon van een gebruiker-->
                </li>
            </ul>
        </div>
    </div>
</header>


</body>