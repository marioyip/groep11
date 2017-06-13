<?php
/**
 * Maakt de connectie met de MSSQL database van op de ICA-site server
 */
function connectToDatabase()
{
    $pw = "rPgxSAaf";
    $username = "iproject11";
    $hostname = "mssql.iproject.icasites.nl";
    $dbname = "iproject11";

    //$pw = "dbrules";
    //$username = "sa";
    //$hostname = "localhost";
    //$dbname = "iproject11";
    global $db;

    $db = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");//verbinding maken met de database
}

/**
 * Maakt de connectie met de MSSQL database op de localhost
 */
function connectToDatabatch()
{
    $pw = "dbrules";
    $username = "sa";
    $hostname = "localhost";
    $dbname = "testdatabatch";
    global $local;

    $local = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");//verbinding maken met de database
}

/**
 * Schrijft een persoon in voor de nieuwsbrief
 *
 * @param $naam: de naam van een bezoeker
 * @param $email: de email van een bezoeker
 */
function insertUserInDatabase($naam, $email) //functie om een gebruiker in de database te plaatsen voor de nieuwsbrief
{
    global $db;
    try {
        $stmt = $db->prepare("INSERT INTO Nieuwsbrief (name, email) VALUES (?,?)"); //query aanmaken om de user in de databse te zetten
        $stmt->execute(array($naam, $email)); //query word uitgevoerd om de naam en email in de database te zetten
    } catch (PDOException $e) { //er wordt gekeken of er een uitzondering is waardoor de query niet uitgevoerd kan worden alleen dan wordt de volgende regel uitgevoerd
        echo "Gebruiker kan niet in de database worden gezet, " . $e->getMessage();
    }
}