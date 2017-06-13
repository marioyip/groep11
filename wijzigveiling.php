<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Veiling wijzigen - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
</head>
<body>

<?php
session_start();
ob_start();
include 'includes/header.php';
include 'includes/catbar.php';
connectToDatabase();
if (isset($_POST['voorwerp'])){

$voorwerp = $_POST['voorwerp'];
//Haalt alle huidige gegevens op
$sql = "SELECT Titel, Beschrijving, Startprijs, Verkoopprijs, Betalingswijze, Betalingsinstructie, Verzendinstructies FROM Voorwerp WHERE Voorwerpnummer = '$voorwerp'";
$stmt = $db->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $titel = $row[0];
    $beschrijving = $row[1];
    $startprijs = $row[2];
    $verkoopprijs = $row[3];
    $betalingswijze = $row[4];
    $betalingsinstructie = $row[5];
    $verzendinstructie = $row[6];
}

?>
<main>
    <div class="containerMinHeight">
        <div class="container marginTop20">
            <div class="col-md-12" align="center">
                <h1>Wijzig veiling: '<?php echo $titel; ?>'</h1>
            </div>
            <div class="row">
                <div class="col-md-12 offset-md-6 marginTop20">
                    <form method="POST" action="wijziging.php">
                        <div hidden>
                            <input type="number" name="voorwerp" value="<?php echo $voorwerp; ?>">
                        </div>
                        <div class="form-group">
                            <label for="titel_voorwerp">Titel</label>
                            <input type="text" class="form-control" id="titel_voorwerp" name="titel"
                                   value="<?php echo $titel; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="beschrijving_voorwerp">Beschrijving</label>
                            <textarea class="form-control" id="beschrijving_voorwerp" name="beschrijving"
                                      maxlength="500"
                                      required><?php echo $beschrijving; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="startprijs-voorwerp">Startprijs (optioneel)</label>
                            <input type="number" class="form-control" id="startprijs-voorwerp" name="startprijs" min="0"
                                   value="<?php echo $startprijs; ?>">
                        </div>
                        <div class="form-group">
                            <label for="verkoopprijs-voorwerp">Maximumprijs</label>
                            <input type="number" class="form-control" id="verkoopprijs-voorwerp" name="verkoopprijs"
                                   min="0"
                                   value="<?php echo $verkoopprijs; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="betalingswijze_voorwerp">Betalingswijze</label>
                            <select class="form-control" id="betalingswijze_voorwerp" name="betalingswijze"
                                    value="<?php echo $betalingswijze; ?>" required>
                                <option>Paypal</option>
                                <option>Bank/Giro</option>
                                <option>Contant</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="betalingsinstructie_voorwerp">Betalingsinstructie</label>
                            <textarea class="form-control" id="betalingsinstructie_voorwerp" name="betalingsinstructie"
                                      rows="2" required><?php echo $betalingsinstructie; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="betalingsinstructie_voorwerp">Verzendinstructie</label>
                            <textarea class="form-control" id="verzendinstructie_voorwerp" name="verzendinstructie"
                                      rows="2"
                                      required><?php echo $verzendinstructie; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Bevestig wijzigingen" name="submit" id="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
<?php
}
include 'includes/footer.php';
ob_end_flush();

?>
