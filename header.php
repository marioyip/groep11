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
                <img class="logo" src="img/eenmaalandermaallogo.png" alt="logo"/></a>
            <a class="navbar-header " href="index.php">
                <img class="logoTekst" src="media/EenmaalAndermaalCreteRound.PNG" alt="tekstlogo"/>
            </a>
        </div>
        <div id="navbar">
            <ul class="nav ">
                <li>
                    <a class="navbar-right glyphicon glyphicon-user textWhite marginTop5 fontSize16 crete" aria-hidden="true"
                       href="inloggen.php"><?php if(isset($_SESSION['username'])){ echo 'Uitloggen'; }else{ echo 'Inloggen';} ?></a> <!--inloggen knop met een glyphicon van een gebruiker-->
                </li>
                <?php if(isset($_SESSION['username'])){ echo'';}else{ echo '
                <li>
                    <a class="navbar-right glyphicon  	glyphicon glyphicon-pencil textWhite marginTop5 fontSize16 crete" aria-hidden="true"
                       href="registreren.php">Registreren</a> <!--inloggen knop met een glyphicon van een gebruiker-->
                </li>
                '; }?>
            </ul>
        </div>
    </div>
</header>


</body>
