<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inloggen - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
include 'header.html';
//pdo_connect();
//login();
?>
<main>

    <div class="container marginTop20 marginBottom40">
        <div class="col-md-12" align="center">
            <h1>Inloggen</h1>
        </div>

        <div class="col-md-12 marginTop20" align="center">
            <div class="col-md-2 marginTop20" align="center">

            </div>
            <div class="col-md-8 marginTop20 text-left">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2 text-left" for="email">Gebruikersnaam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" placeholder="Voer hier je gebruikersnaam in">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Wachtwoord:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pwd" placeholder="**********">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button id="regaanmelden" type="submit" name="aanmelden" class="btn btn-default">Aanmelden</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2 marginTop20" align="center">

            </div>

        </div>
    </div>
</body>
</html>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


<?php
include 'footer.php';
?>