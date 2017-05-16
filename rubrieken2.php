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
include 'header.php';
include 'catbar.php';
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

            require_once('functies.php');
            require_once 'catbar.php';
  /*          echo '<div class="container marginTop20">';*/
            connectToDatabase();

            $sql = "SELECT rubrieknaam FROM rubriek WHERE rubriek = -1 ORDER BY rubrieknaam";
            $stmt = $db->prepare($sql);
            $stmt->execute();

            $total = 0;

            $k = 1;
            while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelrij uitgelezen
            {
                $k++;
                echo '<ul class=" ">';

                for ($i = 0; $i < count($row); $i++) {
                    echo '  <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading backgroundLightGrey">
                            <h4 class="panel-title">
                              <a class="textWhite" data-toggle="collapse" href="#collapse' . $k . '">' . $row[$i] . '</a>
                            </h4>
                          </div>
                          
                        </div>
                    </div>';
                    $sql2 = "SELECT rubrieknaam FROM rubriek WHERE rubriek IN (SELECT rubrieknummer FROM rubriek WHERE rubrieknaam = '$row[$i]') ORDER BY rubrieknaam";
                    $stmt2 = $db->prepare($sql2);
                    $stmt2->execute();
                    echo '<div id="collapse' . $k . '" class="panel-collapse collapse"><li class="list-group-item panel-body list-group-item-action" role="presentation">';
                    while ($row2 = $stmt2->fetch(PDO::FETCH_NUM)) {
                        for ($j = 0; $j < count($row2); $j++) {
                            echo ' | ';
                            echo '<a href = "zoekfunctie.php">' . $row2[$j] . '</a>';


                            $total++;
                        }
                    }
                    echo '</li></div>';
                    $total++;
                }
                echo '</ul >';
            }
            ?>

        </div>
    </div>
    <?php
    include 'footer.php'
    ?>
</body>


</html>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


