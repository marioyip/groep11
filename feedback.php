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
<div class="col-md-12">
    <h2>Geef feedback:</h2>
    <p>
        <?php
        $gebruikersnaam = $_SESSION['username'];
        $sql = "SELECT Koper FROM Voorwerp Where VeilingGesloten = 1 AND Verkoper = '$gebruikersnaam';";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $Koper[] = $row[0];
        }
        if (!empty($Koper)) {
            echo '<a href="feedbackKoper.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Geef feedback op koper</a>';
        } else {
            echo '<a href="feedbackKoper.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Geef feedback op koper</a>';
        }
        echo '</p><p>';

        //verkoper
        $gebruikersnaam = $_SESSION['username'];
        $sql = "SELECT Verkoper FROM Voorwerp Where VeilingGesloten = 1 AND Koper = '$gebruikersnaam';";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $Verkoper[] = $row[0];
        }
        if (!empty($Verkoper)) {
            echo '<a href="feedbackVerkoper.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Geef feedback op verkoper</a>';
        } else {
            echo '<a href="feedbackVerkoper.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Geef feedback op verkoper</a>';
        }
        ?>
    </p>
</div>
</body>




