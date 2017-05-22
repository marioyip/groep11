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
include 'includes/catbar.php'; // Geeft de catbar.php mee aan de index pagina ?>

<main>
    <div class="container">
        <div class="container-fluid">
            <div class="page-header" align="center">
                <h1>Mijn bied profiel</h1>
            </div>
            <div class="col-md-4">
                <img src="media/usericoon.png" alt="" class="img-circle img-responsive"/>
            </div>
            <div class="col-md-8">
                <h4>Voornaam Achternaam</h4>
                <p class="glyphicon glyphicon-user"></p>Gebruikersnaam</p>
                <p class="glyphicon glyphicon-gift"></p>YYYY-DD-MM</p>
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
                <li class="list-group-item">Help</li>
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
        <div class="col-md-2 container-fluid fixed">
        </div>
        <!-- Main Content -->
        <div class="col-md-10 container-fluid fixed">
            <h1> Account </h1>
            <!--Account-->
            <h2>Gegevens</h2>
            <p>Naam: <?php echo $Voornaam . ' ' . $Achternaam; ?></p>
            <p>Gebruikersnaam: <?php echo $Voornaam . ' ' . $Achternaam; ?></p>
            <p>Geboortedatum: <?php echo $GeboorteDag; ?></p>
            <p>Adres: <?php echo $Sraatnaam1 . ' ' . $Huisnummer1 ?></p>
            <p>Adres: <?php echo $Sraatnaam2 . ' ' . $Huisnummer2 ?></p>
            <p>Postcode: <?php echo $GeboorteDag; ?></p>
            <p>Email: <?php echo $Email ?></p>
            <hr> <!--Help-->
            <div class="col-md-10">
                <h1> Help </h1>
                <h2>Wachtwoord wijzigen</h2>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input class="form-control" type="password" placeholder="Current Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span></div>
                        <input class="form-control" type="password" placeholder="New Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span></div>
                        <input class="form-control" type="password" placeholder="Repeat New Password">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default form-control">Submit</button>
                </div>

                <hr>
            </div>
            <div class="col-md-8">
                <h1>Veilingen</h1>
                <h2>Mijn actieve veilingen</h2>
                <div class="col-md-3 itemBox roundborder " align="center">
                    <img class="imgStyle roundborder" src="media/' . $VoorwerpCover2[$i] . '"/>
                    <h4><a class="textDarkGray" href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '">
                            ' . $Titel2[$i] . '</a></h4>
                    <div class="description">
                        ' . $Beschrijving2[$i] . '
                    </div>
                    <a href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '" class="btn btn-default crete"
                       role="button">Bieden</a>
                </div>
                <div class="col-md-3 itemBox roundborder " align="center">
                    <img class="imgStyle roundborder" src="media/' . $VoorwerpCover2[$i] . '"/>
                    <h4><a class="textDarkGray" href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '">
                            ' . $Titel2[$i] . '</a></h4>
                    <div class="description">
                        ' . $Beschrijving2[$i] . '
                    </div>
                    <a href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '" class="btn btn-default crete"
                       role="button">Bieden</a>
                </div>
                <hr>
            </div>
            <div class="col-md-8">
                <h2>Mijn gesloten veilingen</h2>
                <div class="col-md-3 itemBox roundborder " align="center">
                    <img class="imgStyle roundborder" src="media/' . $VoorwerpCover2[$i] . '"/>
                    <h4><a class="textDarkGray" href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '">
                            ' . $Titel2[$i] . '</a></h4>
                    <div class="description">
                        ' . $Beschrijving2[$i] . '
                    </div>
                    <a href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '" class="btn btn-default crete"
                       role="button">Bieden</a>
                </div>
                <hr>
            </div>
            <div class="col-md-10 container-fluid fixed">
            <div class="col-md-8">
                <h1>Biedingen</h1>
                <h2>Mijn actieve biedingen</h2>
                <div class="col-md-3 itemBox roundborder " align="center">
                    <img class="imgStyle roundborder" src="media/' . $VoorwerpCover2[$i] . '"/>
                    <h4><a class="textDarkGray" href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '">
                            ' . $Titel2[$i] . '</a></h4>
                    <div class="description">
                        ' . $Beschrijving2[$i] . '
                    </div>
                    <a href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '" class="btn btn-default crete"
                       role="button">Bieden</a>
                </div>
            </div>
            <hr>
            <div class="col-md-8">
                <h2>Mijn gesloten biedingen</h2>
                <div class="col-md-3 itemBox roundborder " align="center">
                    <img class="imgStyle roundborder" src="media/' . $VoorwerpCover2[$i] . '"/>
                    <h4><a class="textDarkGray" href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '">
                            ' . $Titel2[$i] . '</a></h4>
                    <div class="description">
                        ' . $Beschrijving2[$i] . '
                    </div>
                    <a href="productpagina.php?product=' . $Voorwerpnummer2[$i] . '" class="btn btn-default crete"
                       role="button">Bieden</a>
                </div>
            </div>
            <hr>
        </div>
        </div>
    </div>

</main>
<?php include 'includes/footer.php';
?>

