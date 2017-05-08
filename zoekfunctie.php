<!DOCTYPE html>
<main lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Zoeken - Eenmaal Andermaal</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
              integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
    </head>
</main>
<body>

<?php
include('header.html');
ini_set('display_errors', 1);

$pw = "dbrules";
$username = "sa";
$hostname = "localhost";
$dbname = "iconcepts";

$db = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0","$username","$pw");

$searchResult = "'%".$_GET["zoeken"]."%'";
$sql = "SELECT * FROM Voorwerp where Voorwerpnummer like $searchResult";
$stmt = $db->prepare($sql); //Statement object aanmaken
$stmt->execute();           //Statement uitvoeren


echo '<table>';
while($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere loop wordt er een tabelrij uitgelezen
{
    echo '<tr>';
    for($i=0;$i<count($row);$i++)
    {
        echo '<td>'.$row[$i].'</td>'; //Loop de rij af
    }
    echo '</tr>';
}
echo '</table>';



include('footer.php');

?>