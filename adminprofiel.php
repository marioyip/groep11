<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wijzig profiel - Eenmaal Andermaal</title>
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

        <!--    Het maken van de algemene inhoud" -->
        <div class="container-fluid">
            <div class="col-md-12" align="center">
                <h1 class="textGreen">Wijzig profiel</h1>
                <hr>
            </div>
        </div>
        <div class="container">
            <div class="col-sm-12">
                <h4 align="center">Voornaam Achternaam</h4>
                <hr/>
                <div class="col-md-2">
                    <!-- required for floating -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                        <li><a href="#account" data-toggle="tab">Accountvoorkeuren</a></li>
                        <li><a href="#adres" data-toggle="tab">Adresgegevens</a></li>
                        <li><a href="#beveiliging" data-toggle="tab">Beveiliging</a></li>

                    </ul>
                </div>
                <div class="col-md-10">
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
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home"></div>
                        <div class="tab-pane" id="account">
                            <form class="form-horizontal borderThinWhite padding10 roundborder" method="post"
                                  action="registercontrol.php">
                                <div class="form-group ">
                                    <label class="control-label col-sm-3 text-left textDarkGray" for="email">Gebruikersnaam</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control textDarkGray" name="voornaam" id="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Voornaam:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Achternaam:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Geboortedatum:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="email">E-mailadres:</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control " name="emailadres" id="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="email">Straatnaam 1</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control " name="emailadres2" id="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Huisnummer 1:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Postcode:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Straatnaam 2:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Huisnummer 2:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Wijzigingen opslaan" name="bevestigmail"
                                           class="btn-default btn">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="adres">
                            <form class="form-horizontal borderThinWhite padding10 roundborder" method="post"
                                  action="registercontrol.php">
                                <div class="form-group ">
                                    <label class="control-label col-sm-3 text-left textDarkGray" for="email">Gebruikersnaam</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control textDarkGray" name="voornaam" id="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Voornaam:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Achternaam:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Geboortedatum:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="email">E-mailadres:</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control " name="emailadres" id="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="email">Straatnaam 1</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control " name="emailadres2" id="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Huisnummer 1:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Postcode:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Straatnaam 2:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Huisnummer 2:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Wijzigingen opslaan" name="bevestigmail"
                                           class="btn-default btn">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="beveiliging">
                            <form class="form-horizontal borderThinWhite padding10 roundborder" method="post"
                                  action="registercontrol.php">
                                <div class="form-group ">
                                    <label class="control-label col-sm-3 text-left textDarkGray" for="email">Gebruikersnaam</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control textDarkGray" name="voornaam" id="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Voornaam:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Achternaam:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Geboortedatum:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="email">E-mailadres:</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control " name="emailadres" id="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="email">Straatnaam 1</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control " name="emailadres2" id="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Huisnummer 1:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Postcode:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Straatnaam 2:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 textDarkGray" for="pwd">Huisnummer 2:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " name="achternaam" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Wijzigingen opslaan" name="bevestigmail"
                                           class="btn-default btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
<?php include 'includes/adminfooter.php'; //geeft de footer mee aan deze pagina
?>