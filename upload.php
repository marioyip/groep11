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
$noOfFiles = 1;
if (isset($_SESSION['fileToUpload2'])) {
    $noOfFiles++;
}
if (isset($_SESSION['fileToUpload3'])) {
    $noOfFiles++;
}
if (isset($_SESSION['fileToUpload4'])) {
    $noOfFiles++;
}


for($i = 0; $i < $noOfFiles; $i++){
    switch ($i){
        case 0:
            $file = $_FILES['fileToUpload1'];
            break;
        case 1:
            $file = $_FILES['fileToUpload2'];
            break;
        case 2:
            $file = $_FILES['fileToUpload3'];
            break;
        case 3:
            $file = $_FILES['fileToUpload4'];
            break;
        default:
            header('Location: index.php');
            break;
    }

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
                $fileNameNew = $_SESSION['voorwerpnummer'] . $i . '.' . $fileExt;
                $fileDest = 'media/uploads/' . $fileNameNew;
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
    $sql = "INSERT INTO Bestand VALUES ('" . $fileDest . "', $voorwerp);
        UPDATE Voorwerp SET VoorwerpCover = '" . $fileDest . "' WHERE Voorwerpnummer = '$voorwerp';";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}

header('Location:index.php');