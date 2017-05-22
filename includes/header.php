<?php

require_once('includes/functies.php'); //functies.php wordt gebruikt om aan de database te kunnen verbinden
connectToDatabase(); //deze functie verbindt de webpagina aan de database

?>
<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Sanchez" rel="stylesheet">
<body>
<header>
    <div class="container-fluid backgroundGreen crete">
        <div class="navbar-header">
            <a class="navbar-header" href="index.php">
                <img class="logo" src="media/eenmaalandermaallogo.png" alt="logo"/></a>
            <a class="navbar-header " href="index.php">
                <img class="logoTekst" src="media/EenmaalAndermaalCreteRound.PNG" alt="tekstlogo"/>
            </a>
        </div>
        <?php
        if (isset($_SESSION['username'])) {
            echo
            '
            <div id="navbar">
                <ul class="nav ">
                    <li>
                        <a class="navbar-right glyphicon glyphicon-user textWhite marginTop5 fontSize16 crete" aria-hidden="true"
                             href="mijnprofiel.php">Mijn profiel</a>
                    </li>
                    <li>
                        <a class="navbar-right glyphicon glyphicon-user textWhite marginTop5 fontSize16 crete" aria-hidden="true"
                             href="uitloggen.php">Uitloggen</a>
                    </li>
                </ul>
            </div>
            ';
        } else {
            echo
            '
            <div id="navbar">
                <ul class="nav ">
                    <li>
                     <a class="navbar-right glyphicon glyphicon-user textWhite marginTop5 fontSize16 crete" aria-hidden="true"
                             href="inloggen.php">Inloggen</a>
                    </li>                
                    <li>
                        <a class="navbar-right glyphicon glyphicon-pencil textWhite marginTop5 fontSize16 crete" aria-hidden="true"
                           href="registreren.php">Registreren</a>
                    </li>
                </ul>
            </div>
            ';
        }

        ?>

    </div>
</header>


</body><!--woooo-->
