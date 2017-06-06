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

include 'includes/header.php';
require_once('includes/functies.php');

connectToDatabase();
?>
<main>

    <div class="container marginTop20 marginBottom40">
        <div class="col-md-12" align="center">
            <h1 class="textGreen">Log in op jouw profiel</h1>
            <hr>
        </div>

        <div class="col-md-12 marginTop20" align="center">
            <div class="col-md-2 marginTop20 text-left">
            </div>
            <div class="col-md-4 marginTop20 text-left loginBox">
                <form class="form-horizontal" method="post" action="#">
                    <h3 class="">Inloggen</h3>
                    <div class="form-group marginBottom20">
                        <label class="control-label col-sm-3" for="gebruikersnaam">Gebruikersnaam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gebruikersnaam" name="gebruikersnaam"
                                   value="<?= isset($postdata['Gebruikersnaam']) ? $postdata['Gebruikersnaam'] : "" ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="pwd">Wachtwoord</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwd" name="pwd"
                                   value="<?= isset($postdata['Wachtwoord']) ? $postdata['Wachtwoord'] : "" ?>">
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['submit'])) {
                        $gebruikersnaam = $_POST["gebruikersnaam"];
                        $pwd = $_POST["pwd"];
                        $error = "";
                        $sql = "SELECT Wachtwoord FROM Gebruiker WHERE Gebruikersnaam = '$gebruikersnaam'"; //De query maken
                        $stmt = $db->prepare($sql); //Statement object aanmaken
                        $stmt->execute();
                        if (empty($gebruikersnaam)) {
                            $error = 'U heeft uw gebruikersnaam niet ingevuld!';
                        }
                        if (empty($pwd)) {
                            $error = 'U heeft uw wachtwoord niet ingevuld!';
                        }
                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            $controleWachtwoord = $row[0];
                            if (!empty($gebruikersnaam) && !empty($pwd)) {
                                if (password_verify($pwd, $controleWachtwoord)) {
                                    $_SESSION['username'] = $gebruikersnaam;
                                    $error = 'U bent al ingelogd! ';
                                    header("Location: index.php");
                                } else if (!password_verify($pwd, $controleWachtwoord)) {
                                    $error = 'Uw gebruikersnaam of wachtwoord klopt niet!';
                                }
                            }
                        }
                        if ($error != "") {
                            echo isset($_POST['submit']) ? "<div class='alert alert-danger'> <p>" . $error . "</p></div>" : "";
                        }
                    }
                    ?>
                    <div class="form-group marginTop35">
                        <div class="col-sm-12">
                            <input type="submit" name="submit" class="btn btn-default col-sm-4" value="Inloggen">
                        </div>
                    </div>

                    <a href="accountreset.php">wachtwoord vergeten?</a>
                </form>
            </div>

            <div class="col-md-4 marginTop20 loginBox text-left" align="center">
                <form class="form-horizontal">
                    <h3 class="">Maak jouw account aan!</h3>
                    <div class="form-group ">
                        <p class="textSize14 marginLeft15">
                            Om in te loggen heb je een account nodig voor Mijn Account. Je kunt dan voortaan:
                        </p>
                        <ul>
                            <li>Veilingen bewaren</li>
                            <li>Je biedingen in de gaten houden</li>
                            <li>Eigen veilingen beheren</li>
                        </ul>
                    </div>
                    <div class="form-group marginTop50">
                        <div class="col-sm-12">
                            <a href="registreren.php" class="btn btn-default" role="button">Registreren</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2 marginTop20 text-left">
            </div>
        </div>
    </div>

</body>
</html>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


<?php
include 'includes/footer.php';

