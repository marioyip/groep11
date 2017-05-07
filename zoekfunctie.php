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

$dbPassword = "Sl4gz!n97";
$dbUserName = "sa";
$dbServer = "localhost";
$dbName = "iconcepts";


$pdo = new PDO ("sqlsrv:Server=$dbServer;Database=$dbName;ConnectionPooling=0");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//zoektermen
$title = "Titel";
$id = "Voorwerpnummer";
$from = "Voorwerp";

$query1 = ("Select $title, $id FROM $from WHERE $id LIKE ?");
$data = $pdo->prepare($query1);
$data->execute(["%".$_POST['zoeken']."%"]);


$table = "<table>";

while ($row = $data->fetch()) {
    $table .= "<tr><td><a href='productpagina.php?id=$row[$id]'>$row[$title]</a></td><td>$row[$id]</td></tr>";
}
$table .= "</table>";

echo $table;
include('footer.php');
