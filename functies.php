<?php
function connectToDatabase() {
    $pw = "Sl4gz!n97";
    $userName = "sa";
    $dbServer = "localhost";
    $dbName = "iconcepts";
    global $pdo;

    $pdo = new PDO ("sqlsrv:Server=$dbServer;Database=$dbName;ConnectionPooling=0;");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

function insertUserInDatabase($username, $password, $voornaam, $achternaam, $email, $geboortedatum) {
    global $pdo;
    $hashedWachtwoord = password_hash($password,1);
    try {
        $stmt = $pdo->prepare("INSERT INTO Gebruiker) VALUES (Gebruikersnaam, Wachtwoord, Voornaam, Achternaam, Emailadres, Geboortedatum)");
        $stmt->execute(array($username,$hashedWachtwoord, $voornaam, $achternaam, $email, $geboortedatum));
    } catch (PDOException $e) {
        echo "Could not insert user, ".$e->getMessage();
    }
}

function displayUsersInDatabase()
{
    global $pdo;
    try {
        $data = $pdo->query("SELECT * FROM ");
        while ($row = $data->fetch()) {
            echo "$row[Gebruikersnaam] $row[Wachtwoord]</br>";
        }
    } catch (PDOException $e) {
        echo "Could not read users, " . $e->getMessage();
    }
}