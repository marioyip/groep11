<?php

require_once('includes/functies.php');

connectToDatabase();

if(isset($_POST['bodgeplaatst'])){

    $productnummer =  $_POST['productnummer'];
    $nieuwbod =  $_POST['bod'];
    $gebruiker = $_POST['gebruiker'];

    echo $productnummer;
    echo '<br>';
    echo $nieuwbod.'<br>';
    echo $gebruiker;


    $sql = "INSERT INTO Bod (Bodbedrag, Gebruiker, Voorwerp) 
            VALUES ($nieuwbod,'$gebruiker',$productnummer);
            ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    header("Location: productpagina.php?product=".$productnummer."");
}
?>