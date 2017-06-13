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
ob_start();
session_start();
include('includes/header.php');
include('includes/catbar.php');
require_once('includes/functies.php');

if (isset($_SESSION['username'])) {
    if($_SESSION['ingelogd'] == true) {
        echo "<div class='alert alert-info' align='center'><p>U bent al ingelogd!</p></div>";
    }
} else {

if (isset($_SESSION['username'])) {
    if (isset($_SESSION['nieuweGebruiker'])) {
        ob_end_clean();
        header('Location: foutmeldingen.php');
    } else {
        ob_end_clean();
        header("Location: index.php");
    }
}

connectToDatabase();
?>
<main>

    <div class="container marginTop20 marginBottom40">
        <div class="col-md-12" align="center">
            <?php if (!empty($_SESSION['nieuweGebruiker'])) {
                echo "<div class='alert alert-success'><p>Beste " . $_SESSION['nieuweGebruiker'] . " uw registratie is gelukt! U kunt nu inloggen!</p></div>";
            }
            ?>
            <h1 class="textGreen">Log in op jouw profiel</h1>
            <hr>
        </div>

        <div class="col-md-12 marginTop20" align="center">
            <div class="col-md-2 marginTop20 text-left">
            </div>
            <div class="col-md-4 marginTop20 text-left loginBox">
                <form class="form-horizontal" method="post">
                    <h3 class="">Inloggen</h3>
                    <div class="form-group marginBottom20">
                        <label class="control-label col-sm-3" for="gebruikersnaam">Gebruikersnaam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gebruikersnaam" name="gebruikersnaam"
                                   value="<?php echo isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : '' ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="pwd">Wachtwoord</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                    </div>
                    <?php
                    //Inloggen
                    if (isset($_POST['login'])) {
                        $gebruikersnaam = $_POST["gebruikersnaam"];
                        $pwd = $_POST["pwd"];
                        $error = "";
                        $sql = "SELECT Wachtwoord FROM Gebruiker WHERE Gebruikersnaam = '$gebruikersnaam'";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        //Wachtwoord controleren
                        if (empty($gebruikersnaam)) {
                            $error = 'U heeft uw gebruikersnaam niet ingevuld!';
                        }
                        if (empty($pwd)) {
                            $error = 'U heeft uw wachtwoord niet ingevuld!';
                        }
                        if (empty($pwd) && empty($gebruikersnaam)) {
                            $error = 'U heeft uw wachtwoord en uw gebruikersnaam niet ingevuld!';
                        }

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            $controleWachtwoord = $row[0];

                            if (!empty($gebruikersnaam) && !empty($pwd)) {
                                if (password_verify($pwd, $controleWachtwoord)) {
                                    $_SESSION['username'] = $gebruikersnaam;
                                    unset($_SESSION['nieuweGebruiker']);
                                    $_SESSION['ingelogd'] = true;
                                    ob_end_clean();
                                    header("Location: index.php");
                                } else if (!password_verify($pwd, $controleWachtwoord)) {
                                    $error = 'Uw gebruikersnaam of wachtwoord klopt niet!';
                                }
                            }
                        }
                        if (!empty($gebruikersnaam) && !empty($pwd) && empty($controleWachtwoord)) {
                            $error = 'Uw gebruikersnaam of wachtwoord klopt niet!';
                        }
                        if ($error != "") {
                            echo isset($_POST['login']) ? "<div class='alert alert-danger'> <p>" . $error . "</p></div>" : "";
                        }
                    }
                    ?>
                    <div class="form-group marginTop35">
                        <div class="col-sm-12">
                            <input type="submit" name="login" class="btn btn-default col-sm-4" value="Inloggen">
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

