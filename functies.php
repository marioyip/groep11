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
        $stmt = $db->prepare("INSERT INTO Nieuwsbrief (name, email) VALUES (?,?)"); //query aanmaken om de user in de databse te zetten
        $stmt->execute(array($naam, $email)); //query word uitgevoerd om de naam en email in de database te zetten
    } catch (PDOException $e) { //er wordt gekeken of er een uitzondering is waardoor de query niet uitgevoerd kan worden alleen dan wordt de volgende regel uitgevoerd
        echo "Gebruiker kan niet in de database worden gezet, " . $e->getMessage();
    }
}

function registerUser($voornaam, $achternaam, $email, $gebruikersnaam, $wachtwoord,
                      $geboortedatum, $vraag, $antwoord, $straat, $huisnr, $postcode,
                      $plaats, $land, $verkoper)
{
    global $db;
    $hashedWachtwoord = password_hash($wachtwoord, 1); //het meegegeven wachtwoord wordt gehashed
    try {
        $stmt = $db->prepare("INSERT INTO Gebruiker (Achternaam, Straatnaam1, Huisnummer1, 
Antwoordtekst, GeboorteDag, Mailbox, Gebruikersnaam, Land, Plaatsnaam, Postcode, 
Voornaam, Vraag, Wachtwoord, Verkoper) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); //query wordt aangemaakt om de user in de databse te kunnnen zetten
        $stmt->execute(array($achternaam, $straat, $huisnr, $antwoord, $geboortedatum,
            $email, $gebruikersnaam, $land, $plaats, $postcode, $voornaam,
            $vraag, $hashedWachtwoord, $verkoper)); //query word uitgevoerd om alle gegevens van de gebruiker in de database te zetten
    } catch (PDOException $e) {
        echo "Gebruiker kan niet in de database worden gezet, " . $e->getMessage();
    }
}