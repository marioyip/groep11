<!DOCTYPE html>
<html lang="en">
<head>
<!--    <META HTTP-EQUIV="refresh" CONTENT="15">-->
    <meta charset="UTF-8">
    <title>Productpagina - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
</head>
<body>
<?php
session_start();
include 'includes/header.php';
include 'includes/catbar.php';

ini_set('display_errors', 1);
require_once('includes/functies.php');

connectToDatabase();

if (isset($_GET['product'])) {
    $product = $_GET['product'];
    $sql = "SELECT * FROM voorwerp WHERE voorwerp.voorwerpnummer = '$product'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $Looptijd = $row[0];
        $LooptijdbeginDag = $row[1];
        $LooptijdbeginTijdstip = $row[2];
        $LooptijdeindeDag = $row[3];
        $LooptijdeindeTijdstip = $row[4];
        $Startprijs = $row[5];
        $Verkoper = $row[6];
        $Koper = $row[7];
        $Verzendkosten = $row[8];
        $Verkoopprijs = $row[9];
        $Beschrijving = $row[10];
        $Betalingswijze = $row[11];
        $Betalingsinstructie = $row[12];
        $Land = $row[13];
        $Plaatsnaam = $row[14];
        $Titel = $row[15];
        $Verzendinstructies = $row[16];
        $Voorwerpnummer = $row[17];
        $VeilingGesloten = $row[18];
        $VoorwerpCover = $row[19];
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                <!-- titel -->
                <?php echo $Titel; ?>
            </h1>
        </div>
    </div>

</div>

<div class="container marginTop20">
    <div class="col-md-6">
        <div id="myCarousel" class="carousel slide ">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <!-- Wrapper for Slides -->
            <div class="carousel-inner ">
                <div class="item active">
                    <!-- Set the first background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('<?php
                    echo $VoorwerpCover;
                    ?>');"></div>
                </div>
                <div class="item">
                    <!-- Set the second background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('<?php
                    echo $VoorwerpCover;
                    ?>');');"></div>
                </div>
                <div class="item">
                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('<?php
                    echo $VoorwerpCover;
                    ?>');');"></div>
                </div>
                <div class="item">
                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('media/default.png');"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="veilingBox">

            <?php
            if ($VeilingGesloten == 1){
                echo '<h2>DEZE VEILING IS HELAAS GESLOTEN</h2>';
                echo '<p>Kijk rond op de website en vindt de veiling die bij <b>JOU </b>past!</p>';
                $sql = "select TOP 1 Gebruiker from Bod where voorwerp = $Voorwerpnummer Order by bodbedrag DESC ";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    $gebruikerHoogsteBod = $row[0];
                }
                if(empty($gebruikerHoogsteBod)){
                    $gebruikerHoogsteBod = NULL;

                    $sql = "UPDATE Voorwerp SET Koper = '$gebruikerHoogsteBod' WHERE Voorwerpnummer = $Voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                }
                else{

                    $sql = "UPDATE Voorwerp SET Koper = '$gebruikerHoogsteBod' WHERE Voorwerpnummer = $Voorwerpnummer";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    //het maken van de mail die de bevestiging stuurt dat iemand iets heeft gekocht
                    //eerst wat informatie uit de queire halen van diegene die het bod heeft gewonnen
                    $sql = "SELECT email FROM Gebruiker WHERE Gebruikersnaam = '$gebruikerHoogsteBod'";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        $email = $row[0];
                    }
                    //het schrijven van de email zelf
                    $headers =   'MIME-Version: 1.0' . "\r\n";
                    $headers .=  'From: EenmaalAndermaal Veiling <EenmaalAndermaal@iConcepts.nl>' . "\r\n";
                    $headers .=  'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $onderwerp = 'U heeft '.$Titel. ' Gewonnen op EenmaalAndermaal' . "\r\n";
                    $bericht =   'Van harte gefeliciteerd met het winnen van  '.$Titel.'' .  "\r\n";
                    $bericht .= 'Wij van EenmaalAndermaal hopen dat u van dit product geniet' . "\r\n";
                    $bericht .= 'U bent verplicht om te betalen)' .  "\r\n;" .  ' EenmaalAndermaal';
                    mail($email,$onderwerp,$bericht, $headers);
                }
            }
            else{
            ?>
            <h2>Je kunt dit nu kopen!</h2>
            <p><!-- looptijdbegindag -->
                <?php
                echo 'De veiling is op <strong>'.$LooptijdbeginDag.'</strong> om <strong>'.$LooptijdbeginTijdstip.'</strong> geopend. <br>';
                echo 'De veiling is om <strong>'.$LooptijdeindeDag.'</strong> om <strong>'.$LooptijdeindeTijdstip. '</strong> afgelopen. <br>' ;
                echo 'De looptiijd van de veiling is '.$Looptijd.' dagen. <br>'; ?>

            </p>

            <!-- Display the countdown timer in an element -->
            <p class="fontSize20">U heeft nog maar</p>
            <p id="demo" class="fontSize20"></p>

            <script>
                // Set the date we're counting down to
                var countDownDate = new Date("<?php
                    echo $LooptijdeindeDag . ' ' . $LooptijdeindeTijdstip
                    ?>").getTime();

                // Update the count down every 1 second
                var x = setInterval(function () {

                    // Get todays date and time
                    var now = new Date().getTime();

                    // Find the distance between now an the count down date
                    var verschil = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds

                    var days = Math.floor(verschil / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((verschil % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((verschil % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((verschil % (1000 * 60)) / 1000);

                    // Display the result in the element with id="demo"
                    document.getElementById("demo").innerHTML = days + " dagen " + hours + " uur " +
                        +minutes + " minuten en " + seconds + " seconden om te bieden!";

                    // If the count down is finished, write some text
                    if (verschil < 0) {
                        clearInterval(x);
                        document.getElementById("demo").innerHTML = "Helaas, de veiling is afgelopen!";
                    }
                }, 1);
            </script>
            </p>
            <?php
            if(isset($_SESSION['username'])){
            ?>
            <?php } // haakje voor de isset (regel 176) ?>
            <h2>
                <?php
                $sql = "SELECT TOP 1 b.Bodbedrag, g.voornaam, g.achternaam FROM Bod b
                        INNER JOIN Voorwerp v ON b.Voorwerp = v.Voorwerpnummer
                        INNER JOIN Gebruiker g ON b.Gebruiker = g.Gebruikersnaam
                        WHERE v.Voorwerpnummer = " . $Voorwerpnummer . " ORDER BY b.Bodbedrag DESC";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    $Bod = $row[0];
                    $Voornaam = $row[1];
                    $Achternaam = $row[2];
                }
                if (isset($Bod) && $Bod >= $Startprijs) {
                    echo '<h3>Huidige bod: €' . $Bod . ' (' . $Voornaam . ' ' . $Achternaam . ')</h3>';
                } else {
                    echo '<h3>Startprijs: €' . $Startprijs.'</h3>';
                    $Bod=$Startprijs;
                }
                $minimumBod = $Bod;
                $voorbeeldbod = $minimumBod*1.5;
                if($Bod>0.99 && $Bod < 50){
                    $minimumBod = $Bod + 0.50;
                }
                if($Bod>=49.99 && $Bod < 500){
                    $minimumBod = $Bod + 1.00;
                }
                if($Bod>=499.99 && $Bod < 1000){
                    $minimumBod = $Bod + 5.00;
                }
                if($Bod>=999.99 && $Bod < 5000){
                    $minimumBod = $Bod + 10.00;
                }
                if($Bod>5000){
                    $minimumBod = $Bod + 50.00;
                }

                //als er niet is ingelogd dan kan de gebruiker ook niet bieden
                if(isset($_SESSION['username'])){
                ?>
                <form action="bodwordtgeplaatst.php" method="post">
                    <div class="form-group">
                        <div class="col-xs-5">
                            <?php echo '<input type="number" step=0.01 name="bod" min='.$minimumBod.' max="999999.99" class="form-control" Placeholder='.$voorbeeldbod.'>'; ?>
                        </div>
                        <input type="hidden" value="<?php echo $_SESSION['username']; ?>" name="gebruiker">
                        <input type="hidden" value="<?php echo $product; ?>" name="productnummer">
                        <input type="submit" name="bodgeplaatst" value="Plaats bod!" class="btn-default btn">
                    </div>
                </form><?php } ?>
            </h2>
            <div class="scrollbar">
            <ul>
                <?php
                $sql = "SELECT TOP 5 * FROM Bod b
                        INNER JOIN Voorwerp v ON b.Voorwerp = v.Voorwerpnummer
                        INNER JOIN Gebruiker g ON b.Gebruiker = g.Gebruikersnaam
                        WHERE v.Voorwerpnummer = " . $Voorwerpnummer . " ORDER BY b.Bodbedrag DESC";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    $Bod2[] = $row[0];
                    $Voornaam2[] = $row[1];
                    $Achternaam2[] = $row[2];
                    $Tijdstip2[] = $row[3];
                }

                for($i = 0; $i < count($Bod2); $i++){

                    echo '<li>€' . $Bod2[$i] . ' (' . $Voornaam2[$i] . ' ' . $Achternaam2[$i] . ' ' . $Tijdstip2[$i] . ')</li>';

                }
                ?>
            </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 marginTop20">
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Productbeschrijving</a></li>
                    <li><a data-toggle="tab" href="#menu1">Instructies</a></li>
                    <li><a data-toggle="tab" href="#menu2">Contact informatie</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane in active">
                        <p class="sanchez marginTop20 fontSize20"><!-- beschrijving -->
                            <?php echo $Beschrijving; ?>
                        </p>
                    </div>
                    <div id="menu1" class="tab-pane">
                        <h3>Betaling</h3>
                        <p class="sanchez marginTop20 fontSize20"><!-- beschrijving -->
                            <?php echo $Betalingsinstructie; ?>
                        </p>
                        <h3>Levering</h3>
                        <p class="sanchez marginTop20 fontSize20">
                            <?php echo $Verzendinstructies . '</br>' . 'Eventuele verzendkosten: €' . $Verzendkosten; ?>
                        </p>
                    </div>
                    <div id="menu2" class="tab-pane">
                        <p class="sanchez marginTop20 fontSize20">Verkoper:
                            <?php
                            $sql = "SELECT g.voornaam, g.achternaam, g.email FROM Voorwerp v INNER JOIN Gebruiker g ON v.verkoper = g.Gebruikersnaam WHERE v.Voorwerpnummer = " . $Voorwerpnummer;
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                echo $row[0] . ' ';
                                echo $row[1];
                                $email = $row[2];
                            }
                            ?>
                        </p>
                        <p class="sanchez marginTop20 fontSize20">Email:
                            <?php echo $email ?>
                        </p>
                        <p class="sanchez marginTop20 fontSize20">Plaats: <!-- plaatsnaam en land -->
                            <?php echo $Plaatsnaam.' , '.$Land;
                            } // <-- dit haakje is voor de veiling is gesloten.
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
include 'includes/footer.php';
?>


