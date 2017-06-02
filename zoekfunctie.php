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
    <?php$_GET["zoeken"] = strip_tags($_GET["zoeken"]); ?>
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
                $_GET["zoeken"] = strip_tags($_GET["zoeken"]);
                $searchResult = $_GET["zoeken"];
                $gekozenRubriek = $_GET["rubriek"];
                $sql = ";WITH childs AS (
                        SELECT * FROM Rubriek WHERE Rubrieknummer = '$gekozenRubriek'
                        UNION ALL
                        SELECT r.* FROM Rubriek r INNER JOIN childs c ON r.Rubriek = c.Rubrieknummer
                    )
                    SELECT v.Titel, v.Voorwerpnummer, v.VoorwerpCover, v.Beschrijving FROM Voorwerp v INNER JOIN VoorwerpInRubriek vr ON v.Voorwerpnummer = vr.Voorwerp 
                    WHERE vr.RubriekOpLaagsteNiveau IN (SELECT Rubrieknummer FROM childs) AND v.Titel LIKE '%$searchResult%'";

                $stmt = $db->prepare($sql); //Statement object aanmaken
                $stmt->execute();           //Statement uitvoeren

                echo '<table>';
                while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelrij uitgelezen
                {
                    $voorwerptitels[] = $row[0];
                    $voorwerpnummers[] = $row[1];
                    $voorwerpcovers[] = $row[2];
                    $voorwerpbeschrijvingen[] = $row[3];
                }
                echo '<tr>';
                if (isset($voorwerpnummers) && isset($voorwerptitels)) {

                    for ($i = 0; $i < count($voorwerpnummers); $i++) {
                        echo '<div class="col-md-3 itemBox roundborder " align="center"><img class="imgStyle roundborder" src="' . $voorwerpcovers[$i] . '">';
                        echo '<h4><a class="textDarkGray" href="productpagina.php?product=' . $voorwerpnummers[$i] . '">' . $voorwerptitels[$i] . '</a></h4>';
                        echo '<div class="description"></div>';
                        echo '<a href="productpagina.php?product=' . $voorwerpnummers[$i] . '" class="btn btn-default crete" role="button">Bieden</a>';
                        echo '</div>';




//
//                        echo '<td>';
//                        echo '<a href="productpagina.php?product=' . $voorwerpnummers[$i] . '">' . $voorwerptitels[$i] . '</a>';
//                        echo '</td>'; //Loop de rij af
                    }
                } else {
                    echo 'Geen resultaten gevonden.';
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