<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rubrieken - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--bootstrap css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!--bootstrap css-->
    <link rel="stylesheet" href="css/style.css"> <!--eigen css-->
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png"> <!--tabblad icoontje-->

</head>
<body>


<?php
session_start();
include 'includes/header.php'; //geeft de header mee aan deze pagina
include 'includes/catbar.php'; //geeft de categorieën balk mee aan deze pagina

if (isset($_GET['rubriek'])) {
    $gekozenRubriek = $_GET['rubriek'];
}
$sql = "SELECT Rubrieknaam FROM Rubriek WHERE Rubrieknummer = '$gekozenRubriek'";
$stmt = $db->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $titel = $row[0];
}
if ($titel == 'Root') {
    $titel = 'Rubrieken';
}
?>
<main>
    <div class="col-md-12 " align="center">
        <h1 class="textGreen"><?php echo $titel; ?></h1>
    </div>
    </div>
    <div class="container">
        <div class="resultPanel col-md-2 fixed">
            <h3 class="textDarkGray">Overzicht</h3>
            <hr>
            <?php
            echo '<ul class="list-group">';
            //Als er bovenliggende categorieën zijn wordt er een 'vorige' knop toegevoegd
            if ($gekozenRubriek > -1) {
                $sql = "SELECT Rubriek FROM Rubriek WHERE Rubrieknummer = '$gekozenRubriek'";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo '<li class="list-group-item"><a href="?rubriek=' . $row[0] . '">...Vorige</a></li>';
                }
            }
            //De categorieën worden geladen
            $sql = "SELECT Rubrieknaam, Rubrieknummer FROM rubriek WHERE rubriek = '$gekozenRubriek' ORDER BY rubrieknaam";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                $rubrieknamen[] = $row[0];
                $rubrieknummers[] = $row[1];
            }
            if (isset($rubrieknamen) > 0 && count($rubrieknamen > 0)) {
                for ($i = 0; $i < count($rubrieknamen); $i++) {
                    echo '<li class="list-group-item"><a href="?rubriek=' . $rubrieknummers[$i] . '">' . $rubrieknamen[$i] . '</a></li>';
                }
            }
            ?>
            </ul>
        </div>
        <div class="col-md-10 container-fluid fixed">
            <?php
            //Recursieve methode die zolang er onderliggende categorieën ('childs') zijn ook die meeneemt bij het selecteren van voorwerpen
            $sql = ";WITH childs AS (
                        SELECT * FROM Rubriek WHERE Rubrieknummer = '$gekozenRubriek'
                        UNION ALL
                        SELECT r.* FROM Rubriek r INNER JOIN childs c ON r.Rubriek = c.Rubrieknummer
                    )
                    SELECT DISTINCT TOP 50 v.Titel, v.Voorwerpnummer, v.VoorwerpCover, v.Beschrijving, v.Startprijs FROM Voorwerp v LEFT JOIN VoorwerpInRubriek vr ON v.Voorwerpnummer = vr.Voorwerp 
                    WHERE vr.RubriekOpLaagsteNiveau IN (SELECT Rubrieknummer FROM childs) ORDER BY v.Titel";

            $stmt = $db->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                $titels[] = $row[0];
                $voorwerpnummers[] = $row[1];
                $covers[] = $row[2];
                $beschrijvingen[] = $row[3];
                $prijzen[] = $row[4];
            }
            //De alfabetisch eerste 50 (om de performance te verbeteren) voorwerpen in of onder de geselecteerde categorieën worden getoond
            if (isset($titels) && count($titels) > 0) {
                for ($i = 0; $i < count($titels); $i++) {
                    echo '<div class="col-md-3 itemBoxResults roundborder " align="center">';
                    echo '<a href="productpagina.php?product=' . $voorwerpnummers[$i] . '">';
                    echo "<img class=\"imgStyle roundborder\" src=" . $covers[$i] . "></a>";
                    echo '<h4><a class="textDarkGray" href="productpagina.php?product=' . $voorwerpnummers[$i] . '">' . $titels[$i] . '</a></h4>';
                    echo '<div class="description"></div>';
//                    echo '<a href="productpagina.php?product=' . $voorwerpnummers[$i] . '" class="btn btn-default crete" role="button">Bieden</a>';
                    echo '</div>';
                }
            } else {
                echo 'Geen resultaten gevonden.';
            }
            ?>
        </div>
</main>
</body>
</html>
<?php
include 'includes/footer.php'; //geeft de footer mee aan deze pagina
?>