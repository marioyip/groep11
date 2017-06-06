<?php
session_start(  );
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
<div class="marginTop20 col-md-8">
    <h1>Feedback geven:</h1>
    <?php
    $gebruikersnaam = $_SESSION['username'];

    //het feedback geven op de Verkoper
    $sql = "SELECT Verkoper FROM Voorwerp Where VeilingGesloten = 1 AND Koper = '$gebruikersnaam';";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $Verkoper[] = $row[0];
    }
    if (!empty($Verkoper) && empty($_POST['geefFeedbackOpVerkoper'])) {
        echo '<h2>Geef feedback op de koper van jouw succesvolle bieding:</h2>';
        for ($i = 0; $i < count($Verkoper); $i++) {
            echo '
            
            <form action="" method="post">
            <div class="form-group">
            <label for="Verkopers">Verkopers</label>
            <select class="form-control" id="Verkopers" name="Verkoper">
            <option>' . $Verkoper[$i] . '</option>
            </select>
            <input type="submit" value="Geef feedback op deze gebruiker" class="btn-ibis btn marginTop20" name="geefFeedbackOpVerkoper">
            </div>
            </form>
            
            ';
        }
    }
    if (isset($_POST['geefFeedbackOpVerkoper']) && empty($_POST['submit'])) {
        $Verkoper = $_POST['Verkoper'];
        echo '
            <form action="" method="post">
            <div class="form-group">
            <label for="Feedbacksoort">Feedbacksoort</label>
            <select class="form-control" id="Feedbacksoort" name="Feedbacksoort">
            <option>Positief</option>
            <option>Negatief</option>
            </select>
            </div>
            <div class="form-group">
            <label for="Commentaar">Commentaar</label>
            <textarea class="form-control" id="Commentaar" name="commentaar" rows="3" required></textarea>
            </div>
            <input type="hidden" value=' . $Verkoper . ' name="Verkoper">
            <input type="hidden" value="test" name="geefFeedbackOpVerkoper">
            <div class="form-group">
            <input type="submit" value="Geef feedback op deze gebruiker" class="btn-ibis btn marginTop20" name="submit">
            </div>
            </form>
            ';
    }
    if (isset($_POST['submit'])) {
        $Verkoper = $_POST['Verkoper'];
        $commentaar = $_POST['commentaar'];
        $feedbacksoort = $_POST['Feedbacksoort'];
        $soortGebruiker = 'Verkoper';

        $sql = "SELECT Voorwerpnummer FROM Voorwerp Where VeilingGesloten = 1 AND koper = '$gebruikersnaam'; ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $voorwerpnummer = $row[0];
        }

        $sql = "INSERT INTO feedback (Commentaar, Feedbacksoort, SoortGebruiker, Voorwerp) VALUES ('$commentaar', '$feedbacksoort', '$soortGebruiker', $voorwerpnummer)";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        echo 'Bedankt voor het geven van feedback';

    }
    ?>

</div>
</body>
<?php
include 'includes/footer.php';
?>
