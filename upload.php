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
$file = $_FILES['fileToUpload'];

$fileName = $file['name'];
$fileTemp = $file['tmp_name'];
$fileSize = $file['size'];
$fileError = $file['error'];
$fileType = $file['type'];

$a = explode('.', $fileName);
$fileExt = strtolower(end($a));

$allowedExt = array('jpg', 'jpeg', 'png');
if (in_array($fileExt, $allowedExt)) {
    if ($fileError == 0) {
        if ($fileSize < 5000000) {
            $fileNameNew = $_SESSION['voorwerpnummer'] . '.' . $fileExt;
            $fileDest = 'media/uploads/' . $fileNameNew;
            echo $fileTemp . ' ' . $fileDest;
            move_uploaded_file($fileTemp, $fileDest);
            echo 'Done niggah';
        } else {
            echo 'Too big';
        }
    } else {
        echo 'Error boii';
    }
} else {
    echo 'Wrong type!';
}
$voorwerp = $_SESSION['voorwerpnummer'];
$sql = "INSERT INTO Bestand VALUES ('$fileDest', $voorwerp);
        UPDATE Voorwerp SET VoorwerpCover = '$fileDest' WHERE Voorwerpnummer = '$voorwerp';";
$stmt = $db->prepare($sql);
$stmt->execute();

header('Location:index.php');