<?php
function connectToDatabase() //functie om aan de database te kunnen verbinden
{
    $pw = "rPgxSAaf";
    $username = "iproject11";
    $hostname = "mssql.iproject.icasites.nl";
    $dbname = "iproject11";

//  $pw = "dbrules";
//  $username = "sa";
//  $hostname = "localhost";
//  $dbname = "iproject11";
    global $db;

    $db = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");//verbinding maken met de database
}

function connectToDatabatch() //functie om aan de database te kunnen verbinden
{
    $pw = "dbrules";
    $username = "sa";
    $hostname = "localhost";
    $dbname = "testdatabatch";
    global $local;

    $local = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");//verbinding maken met de database
}

function getUser($gebruikersnaam)
{
    try {
        global $db;

        $stmt = $db->prepare("SELECT * FROM Gebruiker WHERE Gebruikersnaam = :naam");
        $stmt->execute(array(':naam' => $gebruikersnaam));
        return $stmt->fetch();

    } catch (PDOException $e) {
        echo "Verbinding mislukt: " . $e->getMessage();
    }
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

function registerUser($voornaam, $achternaam, $email, $gebruikersnaam, $wachtwoord, $geboortedatum, $vraag,
                      $antwoord, $straat, $huisnr, $postcode, $plaats, $land, $verkoper) //functie om een gebruiker in de database te plaatsen om zich aan te kunnen melden
{
    global $db;
    $hashedWachtwoord = password_hash($wachtwoord, 1); //het meegegeven wachtwoord wordt gehashed
    try {
        $stmt = $db->prepare("INSERT INTO Gebruiker (Achternaam, Straatnaam1, Huisnummer1, Antwoordtekst, 
GeboorteDag, Mailbox, Gebruikersnaam, Land, Plaatsnaam, Postcode, Voornaam, Vraag, Wachtwoord, Verkoper) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); //query wordt aangemaakt om de user in de databse te kunnnen zetten
        $stmt->execute(array($achternaam, $straat, $huisnr, $antwoord, $geboortedatum, $email, $gebruikersnaam,
            $land, $plaats, $postcode, $voornaam, $vraag, $hashedWachtwoord, $verkoper)); //query word uitgevoerd om alle gegevens van de gebruiker in de database te zetten
    } catch (PDOException $e) {
        echo "Gebruiker kan niet in de database worden gezet, " . $e->getMessage();
    }
}

function show_form($errors = array())
{

    if ($errors) {
        $errorHtml = '<ul><li>';
        $errorHtml .= implode('</li><li>', $errors);
        $errorHtml .= '</li></ul>';
    } else {
        $errorHtml = '';
    }
    echo <<<_FORM_
<form id="login" method="post" action="inloggen.php">
    <label for="username">Username:</label><input type="text" name="username" id="username"><br>
    <label for="password">Password:</label><input type="password" name="password" id="password"><br>
    <input id="inlog" type="submit" name="submit" value="Log In">
    <p>Nog geen account?</p><a href="registratie.php">Meld je nu aan!</a>
</form>
_FORM_;
}

//function validate_form()
//{
//global $db;
//$input = array();
//$errors = array();
//
////Als password ok is dan true, anders false.
//$password_ok = false;
//
//$input['username'] = $_POST['username'] ?? '';
//$submitted_password = $_POST['password'] ?? '';
//
//$stmt = $db->prepare("SELECT password FROM Subscribers WHERE username = ?");
//$stmt->execute([$input['username']]);
//$row = $stmt->fetch();
//
//if ($row) {
//    $password_ok = password_verify($submitted_password, $row[0]);
//}
//if (!$password_ok) {
//    $errors[] = 'Voer een juiste username en password in';
//}
//return array($errors, $input);
//}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function process_form($input)
{
    //Voeg de gebruiker aan de sessie toe en ga naar het filmoverzicht van FLETNIX.
//    header('Location: filmoverzicht_FLETNIX.php');
    $_SESSION['username'] = $input['username'];
    echo "Welcome, " . $_SESSION['username'];
    $form = <<<HTML
    <!--<a href="filmoverzicht_FLETNIX.php"><input type="submit" name="submit" value="To top 10"></a>-->
HTML;
    echo $form;
    header('Location: index.php');
    echo "Welkom, " . $_SESSION['username'];
}

function login()
{
    pdo_connect();
    $username = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        list($errors, $input) = validate_form();

        if ($errors) {
            echo "Wrong login! Try again";
            show_form();
        } else {
            process_form($input);
        }
    } else {
        show_form();
    }
}


