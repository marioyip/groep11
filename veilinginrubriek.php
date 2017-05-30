<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plaats veiling - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
</head>

<?php
ob_start( );
session_start();
if (isset($_SESSION['username'])){

include 'includes/header.php';
//include 'includes/catbar.php';
require_once 'includes/functies.php';

?>

<body>
<?php
if (isset($_POST['rubriek'])) {
    $parent = $_POST['rubriek'];
} else {
    $parent = -1;
}
$sql = "SELECT Rubrieknummer, Rubrieknaam FROM Rubriek WHERE Rubriek = '$parent' ORDER BY Rubrieknaam ASC";
$stmt = $db->prepare($sql);
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_NUM)){
    $rubrieknummer[] = $row[0];
    $rubrieknaam[] = $row[1];
}
if(isset($rubrieknummer) && count($rubrieknummer) > 0) {
?>
<form method="POST" action="">
    <div class="form-group">
        <label for="rubriek_voorwerp">Rubriek</label>
        <select class="form-control" id="rubriek_voorwerp" name="rubriek" required>
            <?php
            for($i = 0; $i < count($rubrieknummer); $i++){
                echo '<option value=" ' . $rubrieknummer[$i] . ' ">' . $rubrieknaam[$i] . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" value="Selecteer" name="submit">
    </div>
</form>
<?php
} else {
    $rubriek = $_POST['rubriek'];
    $voorwerp = $_SESSION['voorwerpnummer'];
    $sql = "INSERT INTO VoorwerpInRubriek VALUES('$rubriek', '$voorwerp')";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    ob_end_clean( );
    header('Location: uploadfoto.php');
}
?>
</body>
<?php
}
ob_end_flush( );
?>