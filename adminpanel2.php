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

        <div class="container marginTop20 ">
            <div class="col-md-12">
                <h1 class="textGreen" align="center">Adminpanel - Gebruikers</h1>
            </div>
        </div>
        <div class="container marginTop20">
            <div class="">
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

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                        echo '
                            <tr class="backgroundLightGrey">
                            <a href="mijnprofiel.php?=' . $email[$i] . '"><td>
                                <p class="textDarkGray">' . $Gebruikersnaam[$i] . '</p>
                            </td></a>             
                            <td>
                                <p class="textDarkGray">' . $Voornaam[$i] . '</p>
                            </td> 
                            <td>
                                <p class="textDarkGray">' . $Achternaam[$i] . '</p>
                            </td> 
                            <td>
                                <p class="textDarkGray">' . $GeboorteDag[$i] . '</p>
                            </td> 
                            <td>
                                <p class="textDarkGray">' . $email[$i] . '</p>
                            </td> 
                            </tr>
                        ';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
<!--        Veilingen-->
        <div class="container marginTop20 ">
            <div class="col-md-12">
                <h1 class="textGreen" align="center">Adminpanel - Veilingen</h1>
            </div>
        </div>
        <div class="container marginTop20">
            <div class="">
                <?php
                $sql = "SELECT Titel, Verzendkosten, Verkoopprijs, Verkoper, Koper FROM Voorwerp ORDER BY Voorwerpnummer ASC;";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    $Titel[] = $row[0];
                    $Verzendkosten[] = $row[1];
                    $Verkoopprijs[] = $row[2];
                    $Verkoper[] = $row[3];
                    $Koper[] = $row[4];
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
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                        echo '
                            <tr>
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
                            </tr>
                        ';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
</body>
</html>
<?php include 'includes/adminfooter.php'; //geeft de footer mee aan deze pagina
?>