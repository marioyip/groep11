<?php
include ('header.html');
ini_set('display_errors', 1);
$dbPassword = "";
$dbUserName = "sa";
$dbServer = "localhost";
$dbName = "iconcepts";

$pdo = new PDO ("sqlsrv:Server=$dbServer;Database=$dbName;ConnectionPooling=0");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//zoektermen
$title = "Titel";
$id = "Voorwerpnummer";
$from = "Voorwerp";
$where = "Titel";


$query1 = ("Select $title, $id FROM $from WHERE $where LIKE ?");
$data = $pdo->prepare($query1);
$data->execute(["%".$_POST['']."%"]);


$table = "<table>";

while ($row = $data->fetch()){
    $table .= "<tr><td><a href='productpagina.php?id=$row[$id]'>$row[$title]</a></td><td>$row[$id] </td></tr>";
}
$table .="</table>";

echo $table;
include ('footer.php');
?>