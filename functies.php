<?php
function connectToDatabase()
{
    $pw = "rPgxSAaf";
    $username = "iproject11";
    $hostname = "mssql.iproject.icasites.nl";
    $dbname = "iproject11";
    global $db;

    $db = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");//verbinding maken met de database

}

function insertUserInDatabase($naam, $email)
{
    global $db;
    try {
        $stmt = $db->prepare("INSERT INTO Nieuwsbrief (name, email) VALUES (?,?)");
        $stmt->execute(array($naam, $email));
    } catch (PDOException $e) {
        echo "Could not insert user, " . $e->getMessage();
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

function insertUserInNieuwsbrief($id, $name, $email)
{
    global $pdo;
    try {
        $stmt = $pdo->prepare("INSERT INTO Nieuwsbrief VALUES (id, name, email)");
        $stmt->execute(array($id, $name, $email));
    } catch (PDOException $e) {
        echo "Could not insert user, " . $e->getMessage();
    }
}

function registerUser($voornaam, $achternaam, $email, $gebruikersnaam, $wachtwoord, $wachtwoord2,
                      $geboortedatum, $telefoonnr, $vraag, $antwoord, $straat, $huisnr, $postcode,
                      $plaats, $land, $rekeningnr, $rekeninghouder)
{
    echo "Hij komt hier!!!!!! <br>";
    global $db;
    $hashedWachtwoord = password_hash($wachtwoord, 1);
    $hashedWachtwoord2 = password_hash($wachtwoord2, 1);
    try {
        $stmt = $db->prepare("INSERT INTO Gebruiker (Achternaam, Straatnaam1, Huisnummer1, 
Antwoordtekst, GeboorteDag, Mailbox, Gebruikersnaam, Land, Plaatsnaam, Postcode, 
Voornaam, Vraag, Wachtwoord, Verkoper) VALUES (achternaam, straat, huisnr, antwoord, 
geboortedag, email, gebruikersnaam, land, plaats, postcode, voornaam, vraag, wachtwoord, verkoper)");
        $stmt->execute(array($naam, $email));
    } catch (PDOException $e) {
        echo "Could not insert user, " . $e->getMessage();
    }
}