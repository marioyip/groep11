<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zoeken - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
</head>

<body>
<?php
session_start();
include('includes/header.php'); //Geef de header mee
include('includes/catbar.php'); //Geef de categorieën bar mee
?>


<main>

    <div class="containerMinHeight">
        <div class="container ">
            <div class="col-md-12 " align="center">
                <h1 class="textGreen">Zoeken</h1>
            </div>
        </div>
        <div class="container marginTop20">
            <?php ini_set('display_errors', 1);
            require_once('includes/functies.php'); //één keer de functies nodig voor verbinden met Database
            connectToDatabase(); //Verbind met de database (tabblad functies.php)
            //Zoekfunctie voor de database
            if (isset($_GET["zoeken"]) && $_GET["zoeken"] != '') {
                $searchResult = "'%" . $_GET["zoeken"] . "%'";
                $gekozenRubriek = $_GET["rubriek"];
                $sql = "Select voorwerp.titel, voorwerp.Voorwerpnummer from voorwerp INNER JOIN voorwerpinrubriek ON voorwerp.voorwerpnummer = voorwerpinrubriek.voorwerp 
                INNER JOIN rubriek on voorwerpinrubriek.RubriekOpLaagsteNiveau = rubriek.rubrieknummer WHERE voorwerp.titel like $searchResult
                OR Rubriek.rubriek IN( SELECT Rubrieknummer From RUbriek WHERE Rubrieknaam = '$gekozenRubriek')";

                $stmt = $db->prepare($sql); //Statement object aanmaken
                $stmt->execute();           //Statement uitvoeren

                echo '<table>';
                while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelrij uitgelezen
                {
                    $voorwerptitels[] = $row[0];
                    $voorwerpnummers[] = $row[1];
                }
                echo '<tr>';
                for ($i = 0; $i < count($row); $i++) {

                    echo '<td>';
                    echo '<a href="productpagina.php?product=' . $voorwerpnummers[$i] . '">' . $voorwerptitels[$i] . '</a>';
                    echo '</td>'; //Loop de rij af
                }

                echo '</tr>';
                echo '</table>';

            } else {
                echo ' <!-- Foutmelding bij geen zoekterm -->
            <div class="alert alert-danger text-center">
                <strong>Fout: </strong>Voer alstublieft een zoekterm in.
            </div>';
            }
            ?>
        </div>
    </div>


</main>
<?php
include('includes/footer.php'); //geeft de footer mee
?>
</body>


</html>