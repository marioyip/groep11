<!--fonts worden ingeladen-->
<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Sanchez" rel="stylesheet">

<footer>
    <div class="footer backgroundLightGrey sanchez marginTop100" id="footer">
        <div class="container marginBottom30"> <!--div container die om de gehele footer zit-->
            <div class="row">
                <div class="col-lg-4">
                    <h3>Mijn profiel</h3>
                    <ul> <!--ongeordende lijst van links die behoren bij de categorie "mijn profiel"-->
                        <li>
                            <a class="textWhite sanchez" href="../groep11/inloggen.php">Inloggen</a>
                        </li>
                        <li>
                            <a class="textWhite sanchez" href="../groep11/registreren.php">Registreren</a>
                        </li>
                        <li>
                            <a class="textWhite sanchez" href="../groep11/inloggen.php">Mijn biedprofiel</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h3>Info</h3>
                    <ul> <!--ongeordende lijst van links die behoren bij de categorie "info"-->
                        <li>
                            <a class="textWhite sanchez" href="infopagina.php">Help &amp; info</a>
                        </li>
                        <li>
                            <a class="textWhite sanchez" href="media/Algemene_voorwaarden.pdf">Voorwaarden</a>
                        </li>
                        <li>
                            <a class="textWhite sanchez" href="./privacyverklaring.php">Privacy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h3>Contact</h3>
                    <ul> <!-- ongeordende lijst van links die behoren bij de categorie "contact"-->
                        <li>
                            <a class="textWhite sanchez" href="../groep11/contact.php">Contact</a>
                        </li>
                        <li>
                            <a class="textWhite sanchez" href="../groep11/overons.php">Over ons</a>
                        </li>
                        <li>
                            <a class="textWhite sanchez" href="../groep11/solliciteren.php">Werken bij</a>
                        </li>
                    </ul>
                </div>

            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->

    <div class="footer-bottom footer">
        <div class="container">
            <p class="text-center fontSize11 sanchez"> Eenmaal Andermaal © <?= date("Y") ?>  </p>
            <!--naam van de webiste met een jaartal dat automatisch wordt geüpdatet-->
        </div>
    </div>
    <!--/.footer-bottom-->
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    connectToDatabase();

    //inschrijven voor de nieuwsbrief
    ini_set('display_errors', 1);

    if (isset($_POST['submit_form']) && $_POST['submit_form'] != '') { //requirements om in te kunnen schrijven
        $name = $_POST['name'];
        $email = $_POST['email'];

        insertUserInDatabase("$name", "$email"); //indien wordt voldaan aan de requirements wordt de gebruiker via de functie "insertUserInDatabase" in de database gezet
    }
    ?>
</footer>

