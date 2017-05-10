<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 10-5-2017
 * Time: 09:21
 */

$username = "iproject11";
$pw = "rPgxSAaf";
$hostname = "mssql.iproject.icasites.nl";
$dbname = "iproject11";
global $pdo;

$dbc = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");

if(isset($_POST['submit_form']))
{
    $name=$_POST["user_name"];
    $email=$_POST["email"];

    $query = "INSERT INTO Nieuwsbrief  ('id',name, email) VALUES ('','$name','$email')";
    $result = mssql_query($query,$dbc);
//$stmt = $pdo->prepare("insert into Nieuwsbrief values('','$name','$email')");
    echo "Thank You For Joining Our Newsletter";
}
?>