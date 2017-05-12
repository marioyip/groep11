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

    include ('functies.php');

    connectToDatabase();

    $sql = "SELECT rubrieknaam FROM rubriek";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    echo '<table>';
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelri j uitgelezen
    {
        echo '<tr>';
        for ($i = 0; $i < count($row); $i++) {

            echo '<td>';
            echo '<a href="zoekfunctie.php?zoeken=&rubriek='.$row[$i].'">' . $row[$i] . '</a>';
            echo '</td>'; //Loop de rij af
        }

        echo '</tr>';
    }
    echo '</table>';
    ?>



</main>
</body>
</html>
<?php
include 'footer.php';
?>