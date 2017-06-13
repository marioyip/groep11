<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 31-5-2017
 * Time: 15:01
 */
session_start();
require_once 'includes/functies.php';
connectToDatabase();

if (isset($_POST['voorwerp'])) {
    $voorwerp = $_POST['voorwerp'];
    $sql = "DELETE FROM Bestand WHERE voorwerp = '$voorwerp';
            DELETE FROM VoorwerpInRubriek WHERE Voorwerp = '$voorwerp';
            DELETE FROM Voorwerp WHERE Voorwerpnummer = '$voorwerp'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}

header('Location: adminpanel.php');