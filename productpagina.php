<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Productpagina - Eenmaal Andermaal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon-96x96.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/functies.js"></script>
</head>
<body>
<?php
ini_set('display_errors', 1);
include ('functies.php');

connectToDatabase();


//query opstellen
$query1 = ("SELECT * FROM Voorwerp WHERE Voorwerpnummer = 2");
$data = $db->prepare($query1);

$details = "";

$voorwerp = $data->fetch();

$veiling = "";
$veilinggesloten = "\"VeilingGesloten?\"";

if ($veilinggesloten == 1) {
    $veiling .= "gesloten";
}
if ($veilinggesloten == 0) {
    $veiling .= "geopend";
}

if(isset($voorwerp['Titel'])){
    $details = "ja";
    echo $details;
} else {
    $details = "nee";
    echo $details;
}

include 'header.php';
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header"><?= $details.$voorwerp['Titel']; ?></h1>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 marginBottom20">
                <div class="imageBox">
                    <img src="media/<?= $voorwerp['VoorwerpCover']; ?>"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="veilingBox">
                    <h2>De veiling is <?= $veiling ?></h2>
                    <p>
                        De veiling is op <?= $voorwerp['LooptijdbeginDag']; ?> om
                        <?= $voorwerp['LooptijdbeginTijdstip']; ?> geopend.
                        <!--                                    <div class="progress">-->
                        <!--                                        <div class="progress-bar progress-bar-striped active" role="progressbar"-->
                        <!--                                             aria-valuenow="getdate()" aria-valuemin="-->
                        <? //= $voorwerp['LooptijdbeginDag']; ?><!--" aria-valuemax="-->
                        <? //= $voorwerp['LooptijdeindeDag']; ?><!--" style="width:40%">-->
                        <!--                                            40%-->
                        <!--                                        </div>-->
                        <!--                                    </div>-->
                        De looptijd voor de veiling van <?= $voorwerp['Titel']; ?> is <?= $voorwerp['Looptijd']; ?>
                        dagen.
                    </p>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 marginTop20">
                    <div class="container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Product informatie</a></li>
                            <li><a data-toggle="tab" href="#menu1">Details</a></li>
                            <li><a data-toggle="tab" href="#menu2">Contact informatie</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <h3>Product informatie</h3>
                                <p><?= $voorwerp['Beschrijving']; ?></p>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <h3>Details</h3>
                                <p><?= $voorwerp['Beschrijving']; ?></p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>Contact informatie</h3>
                                <p><?= $voorwerp['Verkoper']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php echo $details;
include 'footer.php';
?>


