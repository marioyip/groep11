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
session_start();
if (isset($_SESSION['username'])){
include 'includes/header.php';
include 'includes/catbar.php';
require_once 'includes/functies.php';

?>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    Foto 1 (verplicht):
    <input type="file" name="fileToUpload[]" id="fileToUpload[]" required>
    Foto 2:
    <input type="file" name="fileToUpload[]" id="fileToUpload[]">
    Foto 3:
    <input type="file" name="fileToUpload[]" id="fileToUpload[]">
    Foto 4:
    <input type="file" name="fileToUpload[]" id="fileToUpload[]">
    <input type="submit" value="Upload foto('s)" name="submit">
</form>
</body>
<?php
}
include 'includes/footer.php';
?>