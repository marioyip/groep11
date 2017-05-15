<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rubrieken - Eenmaal Andermaal</title>
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
?>
<main>
    <?php

    include('functies.php');
    include 'catbar.php';

    connectToDatabase();

    $sql = "SELECT rubrieknaam FROM rubriek WHERE rubriek = -1 ORDER BY rubrieknaam";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $total = 0;
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelrij uitgelezen
    {
        echo '<ul>';
        for ($i = 0; $i < count($row); $i++) {
            echo '<li><a href = "" >' . $row[$i] . '</a ></li >';
            $sql2 = "SELECT rubrieknaam FROM rubriek WHERE rubriek IN (SELECT rubrieknummer FROM rubriek WHERE rubrieknaam = '$row[$i]') ORDER BY rubrieknaam";
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
            while ($row2 = $stmt2->fetch(PDO::FETCH_NUM)) {
                for ($j = 0; $j < count($row2); $j++) {
                    echo '<li role="presentation"><a href = "">' . $row2[$j] . '</a>';
                    $total++;
                }
            }
            echo '</br>';
            $total++;
        }
        echo '</ul >';
    }
    echo $total;
    ?>
</main>
</body>
</html>
<?php
include 'footer.php';
?>

