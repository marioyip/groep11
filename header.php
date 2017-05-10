<?php

$pw = "rPgxSAaf";
$username = "iproject11";
$hostname = "mssql.iproject.icasites.nl";
$dbname = "iproject11";

$db = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");//verbinding maken met de database

?>
<body>
<header>
    <div class="container-fluid backgroundGreen">
        <div class="navbar-header">
            <a class="navbar-header" href="homepagina.php">
                <img class="logo" src="img/eenmaalandermaallogo.png" alt="logo"/></a>
            <a class="navbar-header " href="homepagina.php"><img class=" grow logoTekst" src="img/logo.png" alt="logo"/></a>
        </div>
        <div id="navbar">
            <ul class="nav navbar-nav navbar-center">
                <li>
                    <!--                    <a class="textWhite marginLeft200 fontSize16" href="rubrieken.php">Rubrieken</a>-->
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="glyphicon glyphicon-user textWhite fontSize16" aria-hidden="true" href="inloggen.php">
                        Inloggen</a>
                </li>
            </ul>
        </div>
    </div>
</header>

<!---              Nav bar categories
 --->
<div class="catBar">
    <nav id="myNavbar" class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-right ">
                <div class="form-group">
                <form method="GET" action="zoekfunctie.php">
                    <ul class="nav navbar-nav">
                        <li>
                            <input type="text" class="form-control" name="zoeken" placeholder="Zoeken...">
                        </li>
                        <li>
                            <select class="form-control" name="rubriek">
                                <?php
                                $sql = "SELECT Rubrieknaam FROM Rubriek WHERE Rubriek = -1";
                                $stmt = $db->prepare($sql); //Statement object aanmaken
                                $stmt->execute();           //Statement uitvoeren
                                while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelrij uitgelezen
                                {
                                    for ($i = 0; $i < count($row); $i++) {
                                        echo '<option value="' . $row[$i] . '"> ' . $row[$i] . ' </option)>';
                                    }
                                }
                                ?>
                            </select>
                        </li>
                        <li>
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </li>
                    </ul>
                </form>
                </div>
            </div>
            <!--<input type="text" name="sample_search" id="sample_search" onkeyup="search_func(this.value);">-->
        </div>
    </nav>
</div>
</body>