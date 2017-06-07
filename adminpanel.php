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
    <link rel="stylesheet" href="css/style.css"> <!--EenmaalAndermaal css-->
    <link rel="stylesheet" href="css/admin.css"> <!--Admin css-->
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png"> <!--tabblad icoontje-->
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })</script>
</head>
<body>


<?php
session_start();
include 'includes/adminheader.php'; //geeft de adminheader mee aan deze pagina
?>
<main>

    <div class="containerMinHeight">

        <div class="container marginTop20 ">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#item1" role="tab">Gebruikers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#item2" role="tab">Veilingen</a>
                </li>
            </ul>
        </div>
        <div class="container marginTop20">
            <div class="tab-pane active" id="item1" role="tabpanel">
                <div class="container marginTop20">
                    <div class="col-md-3"></div>
                    <div class="input-group col-md-6">
                        <input type="text" class="form-control input-lg" placeholder="Zoeken"/>
                        <span class="input-group-btn">
                            <button class="btn btn-ibisrnd btn-lg" type="button">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </span>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                <div class="container marginTop20">
                    <div class="col-md-12">

                        <?php
                        $sql = "SELECT Gebruikersnaam, Voornaam, Achternaam, GeboorteDag, email FROM Gebruiker ORDER BY Voornaam ASC;";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            $Gebruikersnaam[] = $row[0];
                            $Voornaam[] = $row[1];
                            $Achternaam[] = $row[2];
                            $GeboorteDag[] = $row[3];
                            $email[] = $row[4];
                        }
                        ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Gebruikersnaam</th>
                                <th>Voornaam</th>
                                <th>Achternaam</th>
                                <th>Geboortedatum</th>
                                <th>Email</th>
                                <th>Verwijderen</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($Gebruikersnaam)) {
                                for ($i = 0; $i < count($Gebruikersnaam); $i++) {
                                    ?>
                                    <div class="clickable=row">
                                        <tr>
                                            <td class="username">
                                                <p class="textDarkGray"><?php echo $Gebruikersnaam[$i]; ?></p>
                                            </td>
                                            <td class="firstname">
                                                <p class="textDarkGray"><?php echo $Voornaam[$i]; ?></p>
                                            </td>
                                            <td class="surname">
                                                <p class="textDarkGray"><?php echo $Achternaam[$i]; ?></p>
                                            </td>
                                            <td class="dateofbirth">
                                                <p class="textDarkGray"><?php echo $GeboorteDag[$i]; ?></p>
                                            </td>
                                            <td class="email">
                                                <p class="textDarkGray"><?php echo $email[$i]; ?></p>
                                            </td>
                                            <form method="POST" action="verwijdergebruiker.php">
                                                <td class="delete">
                                                    <input type="hidden" value="<?php echo $Gebruikersnaam[$i]; ?>"
                                                           name="gebruiker">
                                                    <input type="submit" name="submit" value="Verwijder">
                                                </td>
                                            </form>
                                        </tr>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo 'Kan gebruiker niet ophalen.';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container marginTop20">
            <div class="tab-pane" id="item2" role="tabpanel">
                <div class="container marginTop20">
                    <div class="col-md-12 username">
                        <?php
                        $sql = "SELECT  Voorwerpnummer, Titel, Startprijs, Verkoopprijs, Verkoper, Koper FROM Voorwerp ORDER BY Voorwerpnummer ASC;";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            $Voorwerpnummer[] = $row[0];
                            $Titel[] = $row[1];
                            $Startprijs[] = $row[2];
                            $Verkoopprijs[] = $row[3];
                            $Verkoper[] = $row[4];
                            $Koper[] = $row[5];
                        }
                        ?>
                        <table class="table">
                            <thead>
                            <tr>

                                <th>Voorwerpnummer</th>
                                <th>Titel</th>
                                <th>Startprijs</th>
                                <th>Verkoopprijs</th>
                                <th>Verkoper</th>
                                <th>Koper</th>
                                <th>Verwijderen</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($email)) {
                                for ($i = 0; $i < count($Voorwerpnummer); $i++) {
                                    ?>
                                        <tr>
            
                                        <td>
                                            <p class="textDarkGray"><?php echo $Voorwerpnummer[$i]; ?></p>
                                        </td>
            
                                        <td>
                                            <a href="productpagina.php?product=<?php echo $Voorwerpnummer[$i]; ?>" class="textDarkGray"><?php echo $Titel[$i]; ?></a>
                                        </td>
                                        <td>
                                            <p class="textDarkGray"><?php echo $Startprijs[$i]; ?></p>
                                        </td>
                                        <td>
                                            <p class="textDarkGray"><?php echo $Verkoopprijs[$i]; ?></p>
                                        </td>
                                        <td>
                                            <p class="textDarkGray"><?php echo $Verkoper[$i]; ?></p>
                                        </td>
                                        <td>
                                            <p class="textDarkGray"><?php echo $Koper[$i]; ?></p>
                                        </td>
                                            <form method="POST" action="verwijderveiling.php">
                                                <td class="delete">
                                                    <input type="hidden" value="<?php echo $Voorwerpnummer[$i]; ?>"
                                                           name="voorwerp">
                                                    <input type="submit" name="submit" value="Verwijder">
                                                </td>
                                            </form>
                                        </tr>
            
                                    <?php
                                }
                            } else {
                                echo 'Er zijn geen biedingen gedaan.';
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
<?php include 'includes/adminfooter.php'; //geeft de footer mee aan deze pagina
?>