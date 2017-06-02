<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registreren - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

include 'includes/header.php';
include 'includes/catbar.php';

echo isset($_SESSION['errors'])?"<p class='errors'>".$_SESSION["errors"]."</p>":"";
?>
<main>
    <div class="container marginTop20">
        <div class="col-md-12" align="center">
            <h1 class="textGreen">Maak jouw account aan!</h1>
            <hr>
        </div>
        <div class="col-md-12 marginTop20" align="center">
            <div class="col-md-9 marginTop20 text-left">
                <form class="form-horizontal" method="post" action="registercontrol.php">
                    <div class="form-group">
                        <h3>Accountgegevens</h3>
                        <label class="control-label col-sm-2 text-left" for="email">Voornaam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="voornaam" id="email"
                                   placeholder="Kees" value="<?=isset($postdata['Voornaam'])?$postdata['Voornaam']:""?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Achternaam:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control marginLeft200" name="achternaam" id="pwd"
                                   placeholder="van Dalen" value="<?=isset($postdata['Achternaam'])?$postdata['Achternaam']:""?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">E-mailadres:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control marginLeft200" name="emailadres" id="email"
                                   placeholder="k.vandalen@email.com" value="<?=isset($postdata['email'])?$postdata['email']:""?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Herhaal E-mailadres:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control marginLeft200" name="emailadres2" id="email"
                                   placeholder="k.vandalen@email.com" value="<?=isset($postdata['email'])?$postdata['email']:""?>">
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['submit'])) {
                        $voornaam = $_POST["voornaam"];
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
                                    $error = 'Welkom ' . $_SESSION['username'];
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
                    <div class="form-group">
                        <input type="submit" value="bevestig" name="bevestigmail" class="btn-default btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>

<?php
include 'includes/footer.php'
?>
