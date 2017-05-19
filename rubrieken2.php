<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rubrieken2 - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
</head>
<body>

<?php
session_start();
include 'includes/header.php';
include 'includes/catbar.php';
?>
<main>


    <div class="container marginTop20">
        <div class="col-md-12" align="center">
            <h1 class="textGreen">Rubrieken</h1>
        </div>
    </div>
    <div class="container">


        <div class="" align="center">
            <?php
            global $db;
            require_once('includes/functies.php');
            require_once 'includes/catbar.php';
            /*          echo '<div class="container marginTop20">';*/
            connectToDatabase();

            $sql = "SELECT rubrieknaam, Rubrieknummer FROM rubriek WHERE rubriek = -1 ORDER BY rubrieknaam";
            $stmt = $db->prepare($sql);
            $stmt->execute();

            $total = 0;

            $k = 1;
            while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelrij uitgelezen
            {
                $hoofdrubrieknamen[] = $row[0];
                $hoofdrubrieknummers[] = $row[1];
            }
            echo '<ul class=" marginright35 ">';

            for ($i = 0; $i < count($hoofdrubrieknamen); $i++) {
                $k++;
                echo '  <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading backgroundLightGrey">
                            <h4 class="panel-title">
                              <a class="textWhite" data-toggle="collapse" href="#collapse' . $k . '">' . $hoofdrubrieknamen[$i] . '</a>
                            </h4>
                          </div>                          
                        </div>
                    </div>';
                $sql2 = "SELECT rubrieknaam, Rubrieknummer FROM rubriek WHERE rubriek IN (SELECT rubrieknummer FROM rubriek WHERE Rubrieknummer = ' $hoofdrubrieknummers[$i] ') ORDER BY rubrieknaam";
                $stmt2 = $db->prepare($sql2);
                $stmt2->execute();
                echo '<div id="collapse' . $k . '" class="panel-collapse collapse"><li class="list-group-item panel-body list-group-item-action" role="presentation">';
                unset($namen);
                unset($nummers);
                while ($row2 = $stmt2->fetch(PDO::FETCH_NUM)) {
                    $namen[] = $row2[0];
                    $nummers[] = $row2[1];
                }
                for ($j = 0; $j < count($namen); $j++) {
                    if ($j > 0) {
                        echo ' | ';
                    }
                    echo '<a href = "resultatenpagina.php?rubriek= ' . $nummers[$j] . '">' . $namen[$j] . '</a>';
                }
                echo '</li></div>';
            }
            echo '</ul >';
            ?>

        </div>
    </div>
    <?php
    include 'includes/footer.php'
    ?>
</body>


</html>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


