<?php
ini_set('display_errors', 1);

$dbPassword = "Sl4gz!n97";
$dbUserName = "sa";
$dbServer = "localhost";
$dbName = "iconcepts";

$pdo = new PDO ("sqlsrv:Server=$dbServer;Database=$dbName;ConnectionPooling=0");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//zoektermen
$id = "voorwerpnummer";
$from = "";
$where = "voorwerpnummer";

//query opstellen
$query1 = "SELECT * FROM Voorwerp $dbName WHERE $id = 5";
$data = $pdo->prepare($query1);
$data->execute([$_GET['id']]);

$details = "";

$voorwerp = $data->fetch();
$VeilingGesloten = $data->fetch();
$film = $data->fetch();

$veiling = "";

if ($VeilingGesloten['VeilingGesloten'] == 1) {
    $veiling .= "gesloten";
}
if ($VeilingGesloten['VeilingGesloten'] == 0) {
    $veiling .= "geopend";
}

include 'header.html';

echo isset($_SESSION['errors']) ? "<p class='errors'>" . $_SESSION["errors"] . "</p>" : "";
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="page-header"><?= $voorwerp['Titel']; ?></h1>
            <img src="img/<?= $film['VoorwerpCover']; ?>" height='200' width='250'/>
        </div>
        <div class="col-md-6">
            <h2>De veiling is <?=$veiling ?></h2>
            <p>
                De veiling is op <?= $voorwerp['LooptijdbeginDag']; ?> om
                <?= $voorwerp['LooptijdbeginTijdstip']; ?> geopend.
                    <!--            <div class="progress">-->
                    <!--                <div class="progress-bar progress-bar-striped active" role="progressbar"-->
                    <!--                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">-->
                    <!--                    40%-->
                    <!--                </div>-->
                    <!--            </div>-->
                    De looptijd voor de veiling van <?= $voorwerp['Titel']; ?> is <?= $voorwerp['Looptijd']; ?> dagen.
            </p>
        </div>
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

