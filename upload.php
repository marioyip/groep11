<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 30-5-2017
 * Time: 13:09
 */
session_start();
require_once 'includes/functies.php';
connectToDatabase();
$noOfFiles = 0;
for ($i = 0; $i < 4; $i++) {
    if (isset($_FILES['fileToUpload']['name'][$i])) {
        $noOfFiles++;
    }
}

//echo $noOfFiles;

for ($i = 0; $i < $noOfFiles; $i++) {
    $file = $_FILES['fileToUpload'];

    $fileName = $file['name'][$i];
    $fileTemp = $file['tmp_name'][$i];
    $fileSize = $file['size'][$i];
    $fileError = $file['error'][$i];
    $fileType = $file['type'][$i];

    $a = explode('.', $fileName);
    $fileExt = strtolower(end($a));
    $allowedExt = array('jpg', 'jpeg', 'png');

    if (in_array($fileExt, $allowedExt) && $fileError == 0 && $fileSize < 5000000) {
        $fileNameNew = $_SESSION['voorwerpnummer'] . $i . '.' . $fileExt;
        $fileDest = 'media/uploads/' . $fileNameNew;
        move_uploaded_file($fileTemp, $fileDest);
    }
    $voorwerp = $_SESSION['voorwerpnummer'];
    $sql = "INSERT INTO Bestand VALUES ('" . $fileDest . "', $voorwerp)";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    if ($i == 0) {
        $sql = "UPDATE Voorwerp SET VoorwerpCover = '" . $fileDest . "' WHERE Voorwerpnummer = '$voorwerp'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }
}

header('Location:index.php');