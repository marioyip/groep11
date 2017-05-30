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
                    <li class="list-group-item"><a href="x">Gebruikers</a></li>
            </div>
            <div class="col-md-10 container-fluid fixed">
                <div class="col-md-3"></div>
                <div class="input-group col-md-6" >
                    <input type="text" class="form-control input-lg" placeholder="Zoeken" />
                    <span class="input-group-btn">
                        <button class="btn btn-ibisrnd btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
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
                        <td>                        <button type="submit" class="btn btn-ibisrnd">
                                <i class="glyphicon glyphicon-wrench"></i>
                            </button></td>
                    </tr>

                    </tbody>
                </table>
                <div class="col-md-5"></div>
                <button type="button" class="btn btn-ibisrnd btn-lg" align="center">Uitvoeren</button>
            </div>
            <div class="col-md-12 " align="center">
                <h1 class="textGreen">Veilingen</h1>
            </div>
            <div class="col-md-10 container-fluid fixed">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Voorwerpnummer</th>
                        <th>Titel</th>
                        <th>Beschrijving</th>
                        <th>Verkoper</th>
                        <th>Koper</th>
                        <th>Hoogstebod</th>
                        <th>Rubriek</th>
                        <th>Veilinggesloten</th>
                        <th>Verwijderen</th>
                        <th>Aanpassen</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Voorwerpnummer</td>
                        <td>Titel</td>
                        <td>Beschrijving</td>
                        <td>Verkoper</td>
                        <td>Koper</td>
                        <td>Hoogstebod</td>
                        <td>Rubriek</td>
                        <td>Veilinggesloten</td>
                        <td><label><input type="checkbox" value=""></label></td>
                        <td>                        <button type="submit" class="btn btn-ibisrnd">
                                <i class="glyphicon glyphicon-wrench"></i>
                            </button></td>
                    </tr>


                    </tbody>
                </table>
                <button type="button" class="btn btn-ibisrnd btn-lg" align="center">Uitvoeren</button>
            </div>

        </div>
    </div>
</main>
</body>
</html>
<?php include 'includes/adminfooter.php'; //geeft de footer mee aan deze pagina
?>