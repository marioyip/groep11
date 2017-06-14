<?php
session_start();
include 'includes/header.php';
include 'includes/catbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <?php
    //Haalt de gegeven feedback op van de verkoper
    $sql = "SELECT Commentaar, Dag, Feedbacksoort, Tijdstip, Gebruiker.Gebruikersnaam FROM Feedback INNER JOIN Voorwerp ON Voorwerp = Voorwerpnummer LEFT OUTER JOIN Gebruiker ON Voorwerp.Verkoper = Gebruikersnaam WHERE SoortGebruiker = 'verkoper'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $Commentaar[] = $row[0];
        $Dag[] = $row[1];
        $Feedbacksoort[] = $row[2];
        $Tijdstip[] = $row[3];
        $Gebruikersnaam[] = $row[4];
    }
    if (count($Commentaar) > 0) {
        echo '<h2>Lees wat mensen vinden van de verkopers</h2>';
        echo '<table class="table">';
        echo '<tr>';
        echo '<th>Dag</th><th>Tijdstip</th><th>Beoordeling</th><th>Gebruikersnaam</th><th>Commentaar</th>';
        echo '</tr>';
        for ($i = 0; $i < count($Commentaar); $i++) {
            if ($Feedbacksoort[$i] == 'Positief') {
                $kleurtje = 'Success';
            } else {
                $kleurtje = 'Danger';
            }
            echo '
            <tr class=' . $kleurtje . '>
            <td>' . $Dag[$i] . '</td>
            <td>' . $Tijdstip[$i] . '</td>
            <td>' . $Feedbacksoort[$i] . '</td>
            <td>' . $Gebruikersnaam[$i] . '</td>
            <td>' . $Commentaar[$i] . '</td>
            </tr>
            ';
        }
        echo '</table>';
    }
    else{
        echo '<h2>Er is nog geen commentaar gegeven</h2>';
    }

    //Haalt de gegeven feedback op van de koper
    $sql = "SELECT Commentaar, Dag, Feedbacksoort, Tijdstip, Gebruiker.Gebruikersnaam FROM Feedback INNER JOIN Voorwerp ON Voorwerp = Voorwerpnummer LEFT OUTER JOIN Gebruiker ON Voorwerp.Koper = Gebruikersnaam WHERE SoortGebruiker = 'Koper'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $Commentaar1[] = $row[0];
        $Dag1[] = $row[1];
        $Feedbacksoort1[] = $row[2];
        $Tijdstip1[] = $row[3];
        $Gebruikersnaam1[] = $row[4];
    }
    if(count($Commentaar1)>0){
    echo '<hr>';
    echo '<h2>Kopers</h2>';
    echo '<table class="table">';
    echo '<tr>';
    echo '<th>Dag</th><th>Tijdstip</th><th>Beoordeling</th><th>Gebruikersnaam</th><th>Commentaar</th>';
    echo '</tr>';
    for ($i = 0; $i < count($Commentaar1); $i++) {
        if ($Feedbacksoort1[$i] == 'Positief') {
            $kleurtje1 = 'Success';
        } else {
            $kleurtje1 = 'Danger';
        }
        echo '
            <tr class=' . $kleurtje1 . '>
            <td>' . $Dag1[$i] . '</td>
            <td>' . $Tijdstip1[$i] . '</td>
            <td>' . $Feedbacksoort1[$i] . '</td>
            <td>' . $Gebruikersnaam1[$i] . '</td>
            <td>' . $Commentaar1[$i] . '</td>
            </tr>
            ';
    }
    echo '</table>';
    }
    else{
        echo '<h2>Er is nog geen feedback gegeven</h2>';
    }
    ?>
</div>
</body>
