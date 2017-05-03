<?php
include 'header.html';
?>


    <div class="container marginTop100">

        <div class="col-md-12 marginTop100" align="center">
            <h1 class="">Registreren</h1>
        </div>
    </div>
    <div class="container marginTop20">

        <div class="col-md-12 marginTop20" align="center">
            <div class="col-md-3 marginTop20" align="center">

            </div>
            <div class="col-md-6 marginTop20">
                <form class="form-horizontal">
                    <div class="form-group">
                        <h3>Accountgegevens</h3>
                        <label class="control-label col-sm-2" for="email">Voornaam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Achternaam:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pwd" placeholder="Enter password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">E-mailadres:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Gebruiekrsnaam:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pwd" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Wachtwoord:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Herhaal wachtwoord:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Geboortedatum:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Telefoonnnummer:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="pwd" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Beveiligingsvraag:</label>
                        <div class="col-sm-10">
                            <select name="Kies een vraag: ">
                                <option value="huisdier">Wat is mijn favoriete huisdier?</option>
                                <option value="geboorteplaats">Wat is mijn geboorteplaats?</option>
                                <option value="jeugdvriend">Wie is mijn jeugdvriend?</option>
                                <option value="moeder">Wat is de meisjesnaam van mijn moeder?</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Antwoord:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pwd" placeholder="Je antwoord">
                        </div>
                    </div>

                    <h3>Adresgegevens</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Straat:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pwd" placeholder="Janstraat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Huisnummer:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="pwd" placeholder="4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Postcode:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pwd" placeholder="1234 AB">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Plaatsnaam:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pwd" placeholder="Ede">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Land:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" placeholder="België">
                        </div>
                    </div>

                    <h3>Betalingsgegevens</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Rekeningnummer (IBAN):</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pwd" placeholder="NL 53 BANK 1234567890">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Rekeninghouder:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" placeholder="John Doe">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>


                </form>
            </div>
            <div class="col-md-3 marginTop20" align="center">

            </div>

        </div>
    </div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


<?php
include 'footer.php';
?>