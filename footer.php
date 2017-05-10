<footer>
    <div class="footer backgroundGreen"  id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3>Mijn profiel</h3>
                    <ul>
                        <li>
                            <a class="textWhite" href="inloggen.php">Aanmelden</a>
                        </li>
                        <li>
                            <a class="textWhite" href="registreren.php">Registreren</a>
                        </li>
                        <li>
                            <a class="textWhite" href="inloggen.php">Mijn biedprofiel</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-3 col-sm-4 col-xs-6">
                    <h3>Info</h3>
                    <ul>
                        <li>
                            <a class="textWhite" href="infopagina.php">Help &amp; info</a>
                        </li>
                        <li>
                            <a class="textWhite" href="media/Algemene_voorwaarden.pdf">Voorwaarden</a>
                        </li>
                        <li>
                            <a class="textWhite" href="privacyverklaring.php">Privacy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3>Contact</h3>
                    <ul>
                        <li>
                            <a class="textWhite" href="contact.php">Contact</a>
                        </li>
                        <li>
                            <a class="textWhite" href="overons.php">Over ons</a>
                        </li>
                        <li>
                            <a class="textWhite" href="solliciteren.php">Werken bij</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-1 col-sm-4 col-xs-6">
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <form action="" method="post">
                    <h3>Nieuwsbrief</h3>
                    <ul>
                        <li>
                            <div class="input-append newsletter-box text-center">
<!--                                <input title="inschrijven" type="text" class="full text-center textDarkGray form-control fontSize16"><br>-->
                                <input class="full text-center textDarkGray form-control fontSize16" type="text" name="name" id="user_name" placeholder="Naam"/>
                                <input class="full text-center textDarkGray form-control fontSize16" type="email" name="email" id="email" placeholder="E-mail"/>
<!--                                <button class="textDarkGray newsButtonGray bg-gray btn btn-default " type="submit">Inschrijven </button>-->
                                <input class="textDarkGray newsButtonGray bg-gray btn btn-default" type="submit" value="Inschrijven" name="submit_form"/>
                            </div>
                        </li>

                    </ul>
                    </form>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->

    <div class="footer-bottom footer">
        <div class="container">
            <p class="text-center fontSize11"> Eenmaal Andermaal © 2017  </p>
        </div>
    </div>
    <!--/.footer-bottom-->
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    require_once('functies.php');

    connectToDatabase();


    ini_set('display_errors', 1);
    global $pdo;

    if(isset($_POST['submit_form']) && $_POST['submit_form'] !='') {
        $name = $_POST['name'];
        $email = $_POST['email'];

        insertUserInDatabase("$name", "$email");

    }

    ?>
</footer>

