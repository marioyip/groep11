<?php
if (isset($_POST['bodgeplaatst'])) {
    require_once('includes/functies.php');
    connectToDatabase();
    //Bodgegevens worden opgehaald
    $productnummer = $_POST['productnummer'];
    $nieuwbod = $_POST['bod'];
    $gebruiker = $_POST['gebruiker'];
    //Bod wordt geplaatst
    $sql = "INSERT INTO Bod (Bodbedrag, Gebruiker, Voorwerp) 
            VALUES ($nieuwbod,'$gebruiker',$productnummer);
            ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    //Gebuiker wordt terug gestuurd
    header("Location: productpagina.php?product=" . $productnummer . "");
} else {
    header("Location: index.php");
}