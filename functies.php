<?php
function connectToDatabase() {
    $pw = "rPgxSAaf";
    $username = "iproject11";
    $hostname = "mssql.iproject.icasites.nl";
    $dbname = "iproject11";
    global $db;

    $db = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");//verbinding maken met de database

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

function insertUserInNieuwsbrief($id, $name, $email) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("INSERT INTO Nieuwsbrief VALUES (id, name, email)");
        $stmt->execute(array($id, $name, $email));
    } catch (PDOException $e) {
        echo "Could not insert user, ".$e->getMessage();
    }
}