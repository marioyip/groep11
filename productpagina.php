<!DOCTYPE html>
<html lang="en">
<head>
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
    <script src="js/functies.js"></script>
</head>

<body>

<?php

include 'header.php';

ini_set('display_errors', 1);
include ('functies.php');

connectToDatabase();

$veiling = "";
$veilinggesloten = "\"VeilingGesloten?\"";

if ($veilinggesloten == 1) {
    $veiling .= "gesloten";
}
if ($veilinggesloten == 0) {
    $veiling .= "geopend";
}
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header"><!-- titel -->
                    <?php

                    $sql = "SELECT voorwerp.Titel FROM Voorwerp WHERE voorwerp.voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];

                    }
                    ?>
                </h1>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 marginBottom20">
                <div class="imageBox">
                    <img class=imageBox src="media/<?php
                    $sql = "SELECT VoorwerpCover FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?>"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="veilingBox">
                    <h2>De veiling is <?= $veiling ?></h2>
                    <p><!-- looptijdbegindag -->
                        De veiling is op
                        <?php
                        $sql = "SELECT LooptijdbeginDag FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?>
                        om <!-- LooptijdbeginTijdstip -->
                        <?php
                        $sql = "SELECT LooptijdbeginTijdstip FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?>
                        geopend.
                        <!--                                    <div class="progress">-->
                        <!--                                        <div class="progress-bar progress-bar-striped active" role="progressbar"-->
                        <!--                                             aria-valuenow="getdate()" aria-valuemin="-->
                        <? //= $voorwerp['LooptijdbeginDag']; ?><!--" aria-valuemax="-->
                        <? //= $voorwerp['LooptijdeindeDag']; ?><!--" style="width:40%">-->
                        <!--                                            40%-->
                        <!--                                        </div>-->
                        <!--                                    </div>-->

                        <!-- titel -->
                        De looptijd voor de veiling van
                        <?php
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?>
                        is <!-- looptijd -->
                        <?php
                        $sql = "SELECT looptijd FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?>
                        dagen.
                    </p>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 marginTop20">
                    <div class="container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Product informatie</a></li>
                            <li><a data-toggle="tab" href="#menu1">Details</a></li>
                            <li><a data-toggle="tab" href="#menu2">Contact informatie</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane in active">
                                <h3>Product informatie</h3>
                                <p><!-- beschrijving -->
                                    <?php
                                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 101";
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                        echo $row[0];
                                    }
                                    ?>
                                </p>
                            </div>
                            <div id="menu1" class="tab-pane">
                                <h3>Betalingsinstructie</h3>
                                <p><!-- beschrijving -->
                                    <?php
                                    $sql = "SELECT Betalingsinstructie FROM Voorwerp WHERE Voorwerpnummer = 101";
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                        echo $row[0];
                                    }
                                    ?>
                                </p>
                            </div>
                            <div id="menu2" class="tab-pane">
                                <h3>Locatie</h3>
                                <p>Het product wordt verkocht vanuit: <!-- plaatsnaam -->
                                    <?php
                                    $sql = "SELECT Plaatsnaam FROM Voorwerp WHERE Voorwerpnummer = 101";
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                        echo $row[0];
                                    }
                                    ?>,<!-- land -->
                                    <?php
                                    $sql = "SELECT Land FROM Voorwerp WHERE Voorwerpnummer = 101";
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();

                                    while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                        echo $row[0];
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include 'footer.php';
?>


