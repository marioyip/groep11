<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--bootstrap css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!--bootstrap css-->
    <link rel="stylesheet" href="css/style.css"> <!--eigen css-->
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png"> <!--tabblad icoontje-->

</head>
<body>


<?php
session_start();
include 'includes/adminheader.php'; //geeft de adminheader mee aan deze pagina

if (isset($_GET['rubriek'])) {
    $gekozenRubriek = $_GET['rubriek'];
}

//$sortType = 0;
//$NAAM = 1;
//$PRIJS_ASC = 2;
//$PRIJS_DESC = 3;
//$AFLOOPTIJD_ASC = 4;
//$AFLOOPTIJD_DESC = 5;
//echo $_REQUEST['sorttype'];
//
//if (isset($_REQUEST['sorttype'])) {
//    echo $_REQUEST['sorttype'];
//    switch ($_REQUEST['sorttype']) {
//        case 'Naam':
//            $sortType = $NAAM;
//            break;
//        case 'Prijs oplopend':
//            $sortType = $PRIJS_ASC;
//            break;
//        case 'Prijs aflopend':
//            $sortType = $PRIJS_DESC;
//            break;
//        case 'Aflooptijd oplopend':
//            $sortType = $AFLOOPTIJD_ASC;
//            break;
//        case 'Aflooptijd aflopend':
//            $sortType = $AFLOOPTIJD_DESC;
//            break;
//        default :
//            $sortType = 0;
//            break;
//    }
//}
$sql = "SELECT Rubrieknaam FROM Rubriek WHERE Rubrieknummer = '$gekozenRubriek'";
$stmt = $db->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $titel = $row[0];
}
if ($titel == 'Root') {
    $titel = 'Rubrieken';
}
?>
<main>

    <div class="containerMinHeight">
        <!--    <div class="containerMain">-->
        <!--        <div class="container marginTop20">-->
        <div class="col-md-12 " align="center">
            <h1 class="textGreen">Gebruikers</h1>
        </div>

        <div class="container">
            <div class="resultPanel col-md-2 fixed">
                <h3 class="textDarkGray">Beheer</h3>
                <hr>

                <ul class="list-group">
                    <li class="list-group-item"><a href="x">Veilingen</a></li>
                    <li class="list-group-item"><a href="x">Biedingen</a></li>
            </div>
            <div class="col-md-10 container-fluid fixed">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Gebruikersnaam</th>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Geboortedatum</th>
                        <th>Email</th>
                        <th>Adres</th>
                        <th>Postcode</th>
                        <th>Verwijderen</th>
                        <th>Aanpassen</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Gebruikersnaam</td>
                        <td>Voornaam</td>
                        <td>Achternaam</td>
                        <td>Geboortedatum</td>
                        <td>Email</td>
                        <td>Adres</td>
                        <td>Postcode</td>
                        <td><label><input type="checkbox" value=""></label></td>
                        <td><label><input type="checkbox" value=""></label></td>
                    </tr>
                    <tr>
                        <td>Gebruikersnaam</td>
                        <td>Voornaam</td>
                        <td>Achternaam</td>
                        <td>Geboortedatum</td>
                        <td>Email</td>
                        <td>Adres</td>
                        <td>Postcode</td>
                        <td><label><input type="checkbox" value=""></label></td>
                        <td><label><input type="checkbox" value=""></label></td>
                    </tr>
                    <tr>
                        <td>Gebruikersnaam</td>
                        <td>Voornaam</td>
                        <td>Achternaam</td>
                        <td>Geboortedatum</td>
                        <td>Email</td>
                        <td>Adres</td>
                        <td>Postcode</td>
                        <td><label><input type="checkbox" value=""></label></td>
                        <td><label><input type="checkbox" value=""></label></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
</body>
</html>
<?php include 'includes/adminfooter.php'; //geeft de footer mee aan deze pagina
?>