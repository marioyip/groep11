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
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
</head>
<body>

<?php
session_start();

include 'includes/adminheader.php';
require_once('includes/functies.php');

ini_set('display_errors', 'On');
connectToDatabase();
?>
<main>

    <div class="container marginTop20 marginBottom40">
        <div class="col-md-12" align="center">
            <h1 class="textGreen">Admin</h1>
            <hr>
        </div>

        <div class="col-md-12 marginTop20" align="center">
            <div class="col-md-3">

            </div>
            <div class="col-md-6 marginTop20 text-left loginBox">
                <form class="form-horizontal" method="post" action="#">
                    <?php
                    if (isset($_POST['submit'])) {
                        $gebruikersnaam = $_POST["gebruikersnaam"];
                        $pwd = $_POST["pwd"];
                        $sql = "SELECT Wachtwoord FROM Gebruiker WHERE Gebruikersnaam = '$gebruikersnaam'"; //De query maken
                        $stmt = $db->prepare($sql); //Statement object aanmaken
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            //$iswachtwoordgoed = password_verify($ingevoerdwachtwoord, $row[0]);
                            $controleWachtwoord = $row[0];
                            // if ($iswachtwoordgoed == true) {
                            if (password_verify($pwd, $controleWachtwoord)) {
                                $_SESSION['username'] = $gebruikersnaam;
                                echo 'Welkom ' . $_SESSION['username'];
                                header("Location: index.php");
                            } else {
                                echo 'Het gebruikersnaam of wachtwoord klopt niet.';
                            }

                        }
                    }
                    ?>

                    <div class="form-group marginBottom20 text-center" align="center">
                        <label class="control-label col-sm-3" for="gebruikersnaam" align="center">Gebruikersnaam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gebruikersnaam" name="gebruikersnaam">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="pwd">Wachtwoord</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                    </div>
                    <div class="form-group marginTop35">
                        <div class="col-sm-12">
                            <input type="submit" name="submit" class="btn btn-default col-sm-4" value="Inloggen"
                                   align="center">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3">

            </div>
        </div>
    </div>

</body>
</html>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


<?php
;
include 'includes/footer.php';

