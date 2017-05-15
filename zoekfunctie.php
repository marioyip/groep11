<!DOCTYPE html>
<main lang="en">
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
</main>
<body>

<div class="containerMain">
    <?php
    include('header.php');
    include ('catbar.php');
    ini_set('display_errors', 1);

    $pw = "rPgxSAaf";
    $username = "iproject11";
    $hostname = "mssql.iproject.icasites.nl";
    $dbname = "iproject11";

    $db = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");//verbinding maken met de database
    if (isset($_GET["zoeken"]) && $_GET["zoeken"] != '') {
        $searchResult = "'%" . $_GET["zoeken"] . "%'";
        $gekozenRubriek = $_GET["rubriek"];
        $sql = "Select voorwerp.titel from voorwerp INNER JOIN voorwerpinrubriek ON voorwerp.voorwerpnummer = voorwerpinrubriek.voorwerp INNER JOIN rubriek on voorwerpinrubriek.RubriekOpLaagsteNiveau = rubriek.rubrieknummer WHERE voorwerp.titel like $searchResult AND rubriek.rubrieknaam = '$gekozenRubriek' OR Rubriek.rubriek IN( SELECT Rubrieknummer From RUbriek WHERE Rubrieknaam = '$gekozenRubriek')";

        $stmt = $db->prepare($sql); //Statement object aanmaken
        $stmt->execute();           //Statement uitvoeren

        echo '<table>';
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelrij uitgelezen
        {
            echo '<tr>';
            for ($i = 0; $i < count($row); $i++) {

                echo '<td>';
                echo '<a href="productpagina.php">' . $row[$i] . '</a>';
                echo '</td>'; //Loop de rij af
            }

            echo '</tr>';
        }
        echo '</table>';

    } else {
        echo '
        <div class="alert alert-danger textCenter">
            <strong>Fout</strong> Voer alstublieft een zoekterm in
        </div>';
    }

    ?>
</div>
</body>
<?php
include('footer.php');
?>