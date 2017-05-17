<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Over ons - Eenmaal Andermaal</title>
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


<?php include 'header.php'; //geeft de header mee aan deze pagina
include 'catbar.php'; //geeft de cattegorieën balk mee aan deze pagina
?>
<main>


    <div class="containerMain">
        <div class="container marginTop20">
            <div class="col-md-12 " align="center">
                <h1 class="textGreen"><?php echo $titel ?></h1>
            </div>
        </div>
        <div class="container">
            <div class="resultPanel col-md-3">
                <h3 class="textDarkGray">Overzicht</h3>
                <hr>

                <ul class="list-group">
                    <li class="list-group-item">Subrubriek</li>
                    <li class="list-group-item">Subrubriek</li>
                    <li class="list-group-item">Subrubriek</li>
                    <li class="list-group-item">Subrubriek</li>
                    <li class="list-group-item">Subrubriek</li>
                    <li class="list-group-item">Subrubriek</li>
                    <li class="list-group-item">Subrubriek</li>
                    <li class="list-group-item">Subrubriek</li>
                    <li class="list-group-item">Subrubriek</li>
                </ul>
                <div class="form-group">
                    <label for="Order by">Order by</label>
                    <select class="form-control" id="exampleSelect1">
                        <option>Ascending</option>
                        <option>Descending</option>
                        <option>Price</option>
                    </select>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="">Option 1</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="">Option 2</label>
                </div>
                <div class="checkbox disabled">
                    <label><input type="checkbox" value="" disabled>Option 3</label>
                </div>

            </div>
            <div class="col-md-8 container-fluid">
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                //                    Haalt de voorwerpcover, dus het plaatje uit de database en toont deze
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>"/>
                <h4><a class="textDarkGray" href="productpagina.php"><?php
                        //Haalt de titel uit de database
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description"><?php
                    //Haalt de beschrijving uit de database
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>
            </div>
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                //                    Haalt de voorwerpcover, dus het plaatje uit de database en toont deze
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>"/>
                <h4><a class="textDarkGray" href="productpagina.php"><?php
                        //Haalt de titel uit de database
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description"><?php
                    //Haalt de beschrijving uit de database
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>
            </div>
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                //                    Haalt de voorwerpcover, dus het plaatje uit de database en toont deze
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>"/>
                <h4><a class="textDarkGray" href="productpagina.php"><?php
                        //Haalt de titel uit de database
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description"><?php
                    //Haalt de beschrijving uit de database
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                //                    Haalt de voorwerpcover, dus het plaatje uit de database en toont deze
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>"/>
                <h4><a class="textDarkGray" href="productpagina.php"><?php
                        //Haalt de titel uit de database
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description"><?php
                    //Haalt de beschrijving uit de database
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>
            </div>
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                //                    Haalt de voorwerpcover, dus het plaatje uit de database en toont deze
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>"/>
                <h4><a class="textDarkGray" href="productpagina.php"><?php
                        //Haalt de titel uit de database
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description"><?php
                    //Haalt de beschrijving uit de database
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>
            </div>
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                //                    Haalt de voorwerpcover, dus het plaatje uit de database en toont deze
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>"/>
                <h4><a class="textDarkGray" href="productpagina.php"><?php
                        //Haalt de titel uit de database
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description"><?php
                    //Haalt de beschrijving uit de database
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>
            </div>
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                //                    Haalt de voorwerpcover, dus het plaatje uit de database en toont deze
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>"/>
                <h4><a class="textDarkGray" href="productpagina.php"><?php
                        //Haalt de titel uit de database
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description"><?php
                    //Haalt de beschrijving uit de database
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>
            </div>
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                //                    Haalt de voorwerpcover, dus het plaatje uit de database en toont deze
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>"/>
                <h4><a class="textDarkGray" href="productpagina.php"><?php
                        //Haalt de titel uit de database
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description"><?php
                    //Haalt de beschrijving uit de database
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>
            </div>
            <div class="col-md-3 itemBox roundborder " align="center">
                <img class="imgStyle roundborder" src="media/<?php
                //                    Haalt de voorwerpcover, dus het plaatje uit de database en toont deze
                $sql = "SELECT voorwerpcover FROM Voorwerp WHERE Voorwerpnummer = 101";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo $row[0];
                }
                ?>"/>
                <h4><a class="textDarkGray" href="productpagina.php"><?php
                        //Haalt de titel uit de database
                        $sql = "SELECT Titel FROM Voorwerp WHERE Voorwerpnummer = 101";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                            echo $row[0];
                        }
                        ?></a></h4>
                <div class="description"><?php
                    //Haalt de beschrijving uit de database
                    $sql = "SELECT Beschrijving FROM Voorwerp WHERE Voorwerpnummer = 101";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo $row[0];
                    }
                    ?></div>
                <a href="productpagina.php" class="btn btn-default crete" role="button">Bieden</a>
            </div>
        </div>
    </div>
    </div>
</main>
</body>
</html>
<?php include 'footer.php'; //geeft de footer mee aan deze pagina
?>