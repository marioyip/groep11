<?php

$dbPassword = "";
$dbUserName = "sa";
$dbServer = "localhost";
$dbName = "";

$pdo = new PDO ("sqlsrv:Server=$dbServer;Database=$dbName;ConnectionPooling=0");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//zoektermen
$id = "voorwerpnummer";
$from = "";
$where = "voorwerpnummer";

//query opstellen
$query1 = "SELECT * FROM $dbName WHERE $id = ?";
$data = $pdo->prepare($query1);
$data->execute([$_GET['id']]);

$details = "";

$voorwerp = $data->fetch();

include 'header.html';
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="page-header"><?=$voorwerp['titel'];?></h1>
            <img src="img/<?=$film['cover_image'];?>" height='200' width='250'/>
        </div>
        <div class="col-md-6">
            <p>
                De veiling is op <?=$voorwerp['LooptijdbeginDag'];?> om
                <?=$voorwerp['LooptijdbeginTijdstip'];?> geopend.
<!--            <div class="progress">-->
<!--                <div class="progress-bar progress-bar-striped active" role="progressbar"-->
<!--                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">-->
<!--                    40%-->
<!--                </div>-->
<!--            </div>-->
                De looptijd voor de veiling van <?=$voorwerp['titel'];?> is <?=$voorwerp['Looptijd'];?> dagen.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="">Product informatie</a></li>
                <li><a href="">details</a></li>
                <li><a href="">contact informatie</a></li>
            </ul>
        </div>
    </div>
</div>
    <?php echo $details;

    include 'footer.php';
?>

