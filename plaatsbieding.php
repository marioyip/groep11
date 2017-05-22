<?php

session_start();
include 'includes/header.php';
include 'includes/catbar.php';
require_once 'includes/functies.php';

?>

<body>

<h1>Plaats hier een bieding:</h1>
<form>
    <div class="form-group">
        <label for="titel_voorwerp">Titel</label>
        <input type="text" class="form-control" id="titel_voorwerp" name="titel">
    </div>
    <div class="form-group">
        <label for="beschrijving_voorwerp">Beschrijving</label>
        <input type="text" class="form-control input-lg" id="beschrijving_voorwerp" name="beschrijving">
    </div>
    <div class="form-group">
        <label for="startprijs-voorwerp">Startprijs (optioneel)</label>
        <input type="number" class="form-control" id="startprijs-voorwerp" name="startprijs">
    </div>
    <div class="form-control">
        <label for="betalingswijze_voorwerp">Betalingswijze</label>
        <select class="form-control" id="betalingswijze_voorwerp" name="betalingswijze">
            <option>Paypal</option>
            <option>Bank/Giro</option>
            <option>Contant</option>
        </select>
    </div>
    <div class="form-control">
        <label for="betalingsinstructie_voorwerp">Betalingsinstructie</label>
        <input type="text" class="form-control input-lg" id="betalingsinstructie_voorwerp" name="betalingsinstructie">
    </div>
    <div class="form-control">
        <label for="looptijd-voorwerp">Looptijd</label>
        <select class="form-control" id="looptijd-voorwerp" name="looptijd">
            <option>3</option>
            <option>5</option>
            <option>7</option>
        </select>
    </div>
    <div class="form-control">
        <label class="btn btn-default btn-file">
            Foto <input type="file" hidden>
        </label>
    </div>
</form>


</body>
