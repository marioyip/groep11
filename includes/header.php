<?php

require_once('includes/functies.php'); //functies.php wordt gebruikt om aan de database te kunnen verbinden
connectToDatabase(); //deze functie verbindt de webpagina aan de database
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);
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
            if ($_SESSION['username'] == 'admin') {
                echo
                '
            <div id="navbar">
               <ul class="nav ">
                    <li>                    
                        <a href="plaatsveiling.php" class="navbar-right backgroundWhite textGreen marginTop5 marginRight10 fontSize16 crete" aria-hidden="true">
                            Nieuwe veiling
                        </a>                        
                    </li>
                    <li>
                        <a href="#" class="navbar-right backgroundWhite textGreen marginTop5 marginRight10 fontSize16 crete dropdown" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> ';
                echo $_SESSION['username'];
                echo '   <span class="glyphicon glyphicon-menu-down"></span>
                        </a>				
                     <ul class="dropdown-menu dropdown-menu-right nav marginTop50 marginright100" role="menu">                           
                         <li><a href="adminpanel.php">Adminpanel</a></li>
                         <li><a href="mijnprofiel.php#item2">Mijn profiel</a></li>
                         <li><a href="uitloggen.php">Uitloggen</a></li>
                     </ul>          
                    </li>                    
                    <li>
                        <a class="navbar-right textWhite marginTop5 marginRight10 fontSize16 crete dropdown-toggle" data-toggle="dropdown" aria-hidden="true"
                         href="">
                        </a>
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
                        <a href="plaatsveiling.php" class="navbar-right backgroundWhite textGreen marginTop5 marginRight10 fontSize16 crete" aria-hidden="true">
                            Nieuwe veiling
                        </a>                        
                    </li>
                    <li>
                        <a href="#" class="navbar-right backgroundWhite textGreen marginTop5 marginRight10 fontSize16 crete dropdown" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> ';
                echo $_SESSION['username'];
                echo '   <span class="glyphicon glyphicon-menu-down"></span>
                        </a>				
                     <ul class="dropdown-menu dropdown-menu-right nav marginTop50 marginright100" role="menu">                           
                         <li><a href="mijnprofiel.php#item2">Mijn profiel</a></li>
                         <li><a href="uitloggen.php">Uitloggen</a></li>
                     </ul>          
                    </li>                    
                    <li>
                        <a class="navbar-right textWhite marginTop5 marginRight10 fontSize16 crete dropdown-toggle" data-toggle="dropdown" aria-hidden="true"
                         href="">
                        </a>
                    </li>  
                </ul>
            </div>
            ';
            }
        } else {
            echo
            '
            <div id="navbar">
                <ul class="nav ">
                
                    <li>
                       <a class="navbar-right glyphicon glyphicon-phone-alt textWhite marginTop5 marginRight10 fontSize16 crete" aria-hidden="true"
                             href="contact.php"> Contact</a>
                    </li>
                     <li>
                     <a class="navbar-right glyphicon glyphicon-pencil textWhite marginTop5 marginRight10 fontSize16 crete" aria-hidden="true"
                             href="registreren.php"> Registreren</a>
                    </li>  
                     <li>
                    <a class="navbar-right glyphicon glyphicon-user textWhite marginTop5 marginRight10 fontSize16 crete" aria-hidden="true"
                             href="inloggen.php"> Inloggen</a>
                    </li> 
                    
                    
                </ul>
            </div>
            ';
        }

        ?>

    </div>
</header>


</body><!--woooo-->
