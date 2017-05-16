<?php
function connectToDatabase() //functie om aan de database te kunnen verbinden
{
    $pw = "rPgxSAaf";
    $username = "iproject11";
    $hostname = "mssql.iproject.icasites.nl";
    $dbname = "iproject11";

    global $db;

    $db = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");//verbinding maken met de database
}

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

//function registerUser($voornaam, $achternaam, $email, $gebruikersnaam, $wachtwoord, $geboortedatum, $vraag,
//                      $antwoord, $straat, $huisnr, $postcode, $plaats, $land, $verkoper) //functie om een gebruiker in de database te plaatsen om zich aan te kunnen melden
//{
//    $hashedWachtwoord = password_hash($wachtwoord, 1); //het meegegeven wachtwoord wordt gehashed
//
//    $sql = "
//        INSERT INTO Gebruiker (Achternaam, Straatnaam1, Huisnummer1, Antwoordtekst,
//        GeboorteDag, Mailbox, Gebruikersnaam, Land, Plaatsnaam, Postcode, Voornaam, Vraag, Wachtwoord, Verkoper)
//        VALUES ($achternaam, $straat, $huisnr, $antwoord, $geboortedatum, $email, $gebruikersnaam,
//                $land, $plaats, $postcode, $voornaam, $vraag, $hashedWachtwoord, $verkoper)
//                ";
//    $stmt = $db->prepare($sql);
//    $stmt->execute();
//}
//}
?>




