<?php

//$pw = "rPgxSAaf";
//$username = "iproject11";
//$hostname = "mssql.iproject.icasites.nl";
//$dbname = "iproject11";

$pw = "dbrules";
$username = "sa";
$hostname = "localhost";
$dbname = "iconcepts";

$db = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");//verbinding maken met de database

?>
<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Sanchez" rel="stylesheet">
<body>
<header>
    <div class="container-fluid backgroundGreen crete">
        <div class="navbar-header">
            <a class="navbar-header" href="index.php">
                <img class="logo" src="img/eenmaalandermaallogo.png" alt="logo"/></a>
            <a class="navbar-header " href="index.php"><img class=" grow logoTekst" src="img/logo.png" alt="logo"/></a>
        </div>
        <div id="navbar">
            <ul class="nav navbar-nav navbar-center">
                <li>
                    <!--                    <a class="textWhite marginLeft200 fontSize16" href="rubrieken.php">Rubrieken</a>-->
                </li>
            </ul>
            <ul class="nav ">
                <li>

                    <a class="navbar-right glyphicon glyphicon-user textWhite fontSize16 crete" aria-hidden="true"
                       href="inloggen.php">
                        Inloggen</a>
                </li>
            </ul>
        </div>
    </div>
</header>


</body>