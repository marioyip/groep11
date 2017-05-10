<?php
///**
//* Created by PhpStorm.
//* User: Hugo
//* Date: 10-5-2017
//* Time: 09:21
//*/
//
//$username = "iproject11";
//$pw = "rPgxSAaf";
//$hostname = "mssql.iproject.icasites.nl";
//$dbname = "iproject11";
//global $pdo;
//
//$dbc = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");
//
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors','On');


/* Connect naar een sqldatabase mbv PDO */
try {
    $hostname = "mssql.iproject.icasites.nl";
    $dbname = "iproject11";    /*Naam van de DB*/
    $username = "iproject11";      /*Inlognaam*/
    $pw = "rPgxSAaf";      /*Password*/

    /* Maak een nieuw PDO-object aan met de juiste credentials. Deze zorgt voor de verbinding met de DB */
    $db = new PDO ("sqlsrv:server=$hostname;Database=$dbname","$username","$pw");
}
    /*Mocht er iets fout gaan, krijg je een nette melding*/
catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getTraceAsString() . "\n";
    exit;
}
/* Zet het attribuut voor foutmelding op exceptions*/
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




    function insertUserInDatabase($name, $email)
    {
        global $pdo;
        try {
            $stmt = $pdo->prepare("INSERT INTO Nieuwsbrief (name, email) VALUES (?,?)");
            $stmt->execute(array($name, $email));
        } catch (PDOException $e) {
            echo "Could not insert user, " . $e->getMessage();
        }
    }


ini_set('display_errors', 1);
global $pdo;

if(isset($_POST['submit_form'])) {

    $name = $_POST["user_name"];
    $email = $_POST["email"];

    insertUserInDatabase("$name", "$email");
}
?>