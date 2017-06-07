<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wijzig veiling - Eenmaal Andermaal</title>

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
        <div class="container-fluid">
            <div class="col-md-12" align="center">
                <h1 class="textGreen">Wijzig veiling</h1>
                <hr>
            </div>
        </div>
        <div class="container">
            <?php
            //  het ophalen van de informatie voor op het tabblad "Account"
            connectToDatabase();
            $gebruikersnaam = $_SESSION['username'];
            $query = "SELECT TOP 1 Gebruikersnaam, Voornaam, Achternaam, GeboorteDag, email,
                Straatnaam1, Huisnummer1, Straatnaam2, Huisnummer2 FROM Gebruiker WHERE Gebruikersnaam = '$gebruikersnaam' ";
            $stmt = $db->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                $Gebruikersnaam = $row[0];
                $Voornaam = $row[1];
                $Achternaam = $row[2];
                $GeboorteDag = $row[3];
                $Mailbox = $row[4];
                $Straatnaam1 = $row[5];
                $Huisnummer1 = $row[6];
                $Straatnaam2 = $row[7];
                $Huisnummer2 = $row[8];
            }
            ?>
            <div class="col-sm-12">
                <h4 align="center"><?php echo $Voornaam; ?> <?php echo $Achternaam; ?></h4>
                <hr/>
                <div class="tabpanel">
                    <div class="col-md-2">
                        <ul class="nav nav-pills nav-stacked tabs-left" role="tablist">
                            <li role="presentation" class="brand-nav "><a href="#account" data-toggle="tab">Account</a></li>
                            <li role="presentation" class="brand-nav "><a href="#adres" data-toggle="tab">Adres</a></li>
                            <li role="presentation" class="brand-nav "><a href="#beveiliging" data-toggle="tab">Beveiliging</a></li>

                        </ul>
                    </div>
                    <div class="col-md-10">
                        <div class="tab-content">
                            <div role="tabpanel " class="tab-pane active" id="account">
                                <div class="col-md-12">
                                    <form class="form-horizontal borderThinWhite padding10 roundborder" method="post"
                                          action="verwijdergebruiker.php">
                                        <div class="form-group ">
                                            <label class="control-label col-sm-3 text-left textDarkGray" for="email">Gebruikersnaam</label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="<?php echo $Gebruikersnaam;?>" class="form-control textDarkGray" name="voornaam"
                                                       id="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3 textDarkGray"
                                                   for="pwd">Voornaam:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control "placeholder="<?php echo $Voornaam;?>" name="achternaam" id="pwd">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3 textDarkGray"
                                                   for="pwd">Achternaam:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control "placeholder="<?php echo $Achternaam;?>" name="achternaam" id="pwd">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3 textDarkGray"
                                                   for="pwd">Geboortedatum:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control "placeholder="<?php echo $GeboorteDag;?>" name="achternaam" id="pwd">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3 textDarkGray"
                                                   for="email">E-mailadres:</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control "placeholder="<?php echo $email;?>" name="emailadres" id="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <input type="submit" value="Wijzigingen opslaan" name="bevestigmail"
                                                       class="btn-success btn">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="adres">
                                <div class="col-md-12">
                                    <form class="form-horizontal borderThinWhite padding10 roundborder" method="post"
                                          action="registercontrol.php">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3 textDarkGray" for="email">Straatnaam
                                                1</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control " name="emailadres2" placeholder="<?php echo $Straatnaam1;?>" id="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3 textDarkGray" for="pwd">Huisnummer
                                                1:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control " name="achternaam" placeholder="<?php echo $Huisnummer1;?>" id="pwd">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3 textDarkGray"
                                                   for="pwd">Postcode:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control " name="achternaam" placeholder="<?php echo $Straatnaam2;?>" id="pwd">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3 textDarkGray" for="pwd">Straatnaam
                                                2:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control " name="achternaam" placeholder="<?php echo $Straatnaam2;?>" id="pwd">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3 textDarkGray" for="pwd">Huisnummer
                                                2:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control " name="achternaam" placeholder="<?php echo $Huisnummer2;?>" id="pwd">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <input type="submit" value="Wijzigingen opslaan" name="bevestigmail"
                                                       class="btn-success btn">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div role="tabpanel" class="tab-pane" id="beveiliging">
                                <div class="col-md-12">
                                    <form class="form-horizontal borderThinWhite padding10 roundborder" method="post"
                                          action="registercontrol.php">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3 textDarkGray" for="pwd">Oude wachtwoord</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control " name="achternaam" placeholder="" id="pwd">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3 textDarkGray" for="pwd">Nieuw wachtwoord</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control " name="achternaam" placeholder="" id="pwd">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3 textDarkGray" for="pwd">Wachtwoord herhalen:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control " name="achternaam" id="pwd">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <input type="submit" value="Opslaan" name="bevestigmail"
                                                       class="btn-success btn">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'includes/adminfooter.php'; //geeft de footer mee aan deze pagina
?>