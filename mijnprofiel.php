<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mijn bied profiel - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
</head>
<body>

<?php
include 'includes/header.php'; // Geeft de header mee aan de index.php pagina
include 'includes/catbar.php'; // Geeft de catbar.php mee aan de index pagina

$sql = 'SELECT * FROM Gebruiker';
$stmt = $db->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $Achternaam = $row[0];
    $Straatnaam1 = $row[1];
    $Huisnummer1 = $row[2];
    $Straatnaam2 = $row[3];
    $Huisnummer2 = $row[4];
    $Antwoordtekst = $row[5];
    $GeboorteDag = $row[6];
    $Email = $row[7];
    $Gebruikersnaam = $row[8];
    $Land = $row[9];
    $Plaatsnaam = $row[10];
    $Postcode = $row[11];
    $Voornaam = $row[12];
    $Vraag = $row[13];
    $Wachtwoord = $row[14];
    $Verkoper = $row[15];
}

?>

<main>
    <div class="container">
        <div class="container-fluid">
            <div class="page-header" align="center">
                <h1>Mijn bied profiel</h1>
            </div>
            <div class="col-md-4">
                <img src="http://placehold.it/300x300" alt="" class="img-circle img-responsive"/>
            </div>
            <div class="col-md-8">
                <h4><?php echo $Voornaam . ' ' . $Achternaam; ?></h4>
                <p class="glyphicon glyphicon-user"></p><?php echo $Gebruikersnaam;?></p>
                <p class="glyphicon glyphicon-gift"></p><?php echo $GeboorteDag; ?></p>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">
                        Uitloggen
                    </button>

                </div>
            </div>
        </div>
        <!-- Menu -->
        <div class="resultPanel col-md-2 fixed">
            <h3 class="textDarkGray">Mijn profiel</h3>
            <hr>
            <ul class="list-group">
                <li class="list-group-item">Account</li>
                <li class="list-group-item">Notificaties</li>
            </ul>
            <h3 class="textDarkGray">Mijn veilingen</h3>
            <hr>
            <ul class="list-group">
                <li class="list-group-item">Biedingen</li>
                <li class="list-group-item">Veilingen</li>
            </ul>
            <h3 class="textDarkGray">Mijn biedingen</h3>
            <hr>
            <ul class="list-group">
                <li class="list-group-item">Biedingen</li>
                <li class="list-group-item">Gewonnen</li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 container-fluid fixed">
            <h1> Titel </h1>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        </div>
    </div>

</main>
<?php include 'includes/footer.php';
?>