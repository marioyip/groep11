<?php include 'header.html' ?>

<div class="container marginTop20">
<h1>Contact</h1>
<h2>Voor suggesties, problemen of andere zaken neem contact op!</h2>

    <div>
        <br>
        <form>
            <div class="form-group">
                <label for="emailadresVanGebruiker">Email</label>
                <input type="email" class="form-control" id="emailadresVanGebruiker" placeholder="Voer je email-adres in"
            </div>
        </form>
        <br>
        <form>
            <div class="form-group">
                <label for="tekstvakFeedback">Wat kunnen we voor je doen?</label>
                <textarea class="form-control" rows="3" placeholder="Ga ervoor."></textarea>
            </div>
        </form>
        <div>
            <button type="button" class="btn btn-default submit">
                Verstuur
            </button>
        </div>
    </div>

</div>

<?php include 'footer.php'?>
