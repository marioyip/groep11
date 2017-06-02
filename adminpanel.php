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
                        $sql = "SELECT * FROM Gebruiker ORDER BY Voornaam ASC;";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            $Achternaam[] = $row[0];
                            $Straatnaam1[] = $row[1];
                            $Huisnummer1[] = $row[2];
                            $Straatnaam2[] = $row[3];
                            $Huisnummer2[] = $row[4];
                            $Antwoordtekst[] = $row[5];
                            $GeboorteDag[] = $row[6];
                            $email[] = $row[7];
                            $Gebruikersnaam[] = $row[8];
                            $Land[] = $row[9];
                            $Plaatsnaam[] = $row[10];
                            $Postcode[] = $row[11];
                            $Voornaam[] = $row[12];
                            $Vraag[] = $row[13];
                            $Wachtwoord[] = $row[14];
                            $Verkoper[] = $row[15];
                        }
                        ?>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Gebruikersnaam</th>
                                <th>Voornaam</th>
                                <th>Achternaam</th>
                                <th>Geboortedatum</th>
                                <th>Email</th>
                                <th>Verwijderen</th>
                                <th>Aanpassen</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for ($i = 0; $i < 20; $i++) {
                                echo '
                            <tr class="backgroundLightGrey">
                            <td class="username">
                                <p class="textDarkGray">' . $Gebruikersnaam[$i] . '</p>
                            </td>           
                            <td class="firstname">
                                <p class="textDarkGray">' . $Voornaam[$i] . '</p>
                            </td> 
                            <td class="surname">
                                <p class="textDarkGray">' . $Achternaam[$i] . '</p>
                            </td> 
                            <td class="dateofbirth">
                                <p class="textDarkGray">' . $GeboorteDag[$i] . '</p>
                            </td> 
                            <td class="email">
                                <p class="textDarkGray">' . $email[$i] . '</p>
                            </td> 
                            <td class="delete"><label><input type="checkbox" value="" name="delete" id="delete"></label></td>
                            <td>                        
                            <button type="submit" class="btn btn-ibisrnd">
                                <i class="glyphicon glyphicon-wrench"></i>
                            </button>
                            </td>
                            </tr>
                        ';
                            }
                            ?>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-ibisrnd btn-lg" align="center">Uitvoeren</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container marginTop20">
            <div class="tab-pane active" id="item2" role="tabpanel">
                <div class="container marginTop20">
                    <div class="col-md-12 username">
                        <?php
                        $sql = "SELECT Titel, Verzendkosten, Verkoopprijs, Verkoper, Koper,Voorwerpnummer FROM Voorwerp ORDER BY Voorwerpnummer ASC;";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            $Titel[] = $row[0];
                            $Verzendkosten[] = $row[1];
                            $Verkoopprijs[] = $row[2];
                            $Verkoper[] = $row[3];
                            $Koper[] = $row[4];
                            $Voorwerpnummer[] = $row[5];
                        }
                        ?>
                        <table class="table table-striped">
                            <thead>
                            <tr>

                                <th>Titel</th>
                                <th>Verzendkosten</th>
                                <th>Verkoopprijs</th>
                                <th>Verkoper</th>
                                <th>Gewonnen door</th>
                                <th>Voorwerpnummer</th>
                                <th>Verwijderen</th>
                                <th>Aanpassen</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for ($i = 0; $i < 20; $i++) {
                                echo '
                                        <tr class="backgroundLightGrey">
            
                                        <a href="mijnprofiel.php?=' . $email[$i] . '"><td>
                                            <p class="textDarkGray">' . $Titel[$i] . '</p>
                                        </td></a>
            
                                        <td>
                                            <p class="textDarkGray">€' . $Verzendkosten[$i] . '</p>
                                        </td>
                                        <td>
                                            <p class="textDarkGray">€' . $Verkoopprijs[$i] . '</p>
                                        </td>
                                        <td>
                                            <p class="textDarkGray">' . $Verkoper[$i] . '</p>
                                        </td>
                                        <td>
                                            <p class="textDarkGray">' . $Koper[$i] . '</p>
                                        </td>
                                                                        <td><p class="textDarkGray">' . $Voorwerpnummer[$i] . '</p></td>
            
                                                                    <td><label><input type="checkbox" value=""></label></td>
                                        <td>                        <button type="submit" class="btn btn-ibisrnd">
                                            <i class="glyphicon glyphicon-wrench"></i>
                                        </button>
                                        </td>
                                        </tr>
            
                                    ';
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