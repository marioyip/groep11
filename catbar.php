<!---              Nav bar categories
--->
<div class="catBar">
    <nav id="myNavbar" class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container-fluid brilliantWhite">
            <!--            <div class="navbar-header">-->
            <!--                <button type="button" class="navbar-toggle" data-toggle="collapse"-->
            <!--                        data-target="#bs-example-navbar-collapse-1">-->
            <!--                    <span class="sr-only">Toggle navigation</span>-->
            <!--                    <span class="icon-bar"></span>-->
            <!--                    <span class="icon-bar"></span>-->
            <!--                    <span class="icon-bar"></span>-->
            <!--                </button>-->
            <!--            </div>-->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <a <a class=" container-fluid nav navbar-left navbar-nav fontSize16 crete textDarkGray"
                  href="rubrieken.php">
                      Rubrieken</a>
            <div class="navbar-right marginRight10 ">
                <div class="form-group">
                    <form method="GET" action="zoekfunctie.php">
                        <ul class="nav navbar-nav">
                            <li>
                                <input type="text" class="form-control" name="zoeken" placeholder="Zoeken...">
                            </li>
                            <li>
                                <select class="form-control" name="rubriek">
                                    <?php
                                    $sql = "SELECT Rubrieknaam FROM Rubriek WHERE Rubriek = -1 ORDER BY Rubrieknaam";
                                    $stmt = $db->prepare($sql); //Statement object aanmaken
                                    $stmt->execute();           //Statement uitvoeren
                                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelrij uitgelezen
                                    {
                                        for ($i = 0; $i < count($row); $i++) {
                                            echo '<option value="' . $row[$i] . '"> ' . $row[$i] . ' </option)>';
                                        }
                                    }
                                    ?>
</select>
</li>
<li>
    <button class="btn btn-default" type="submit">
        <span class="glyphicon glyphicon-search"></span>
    </button>
</li>
</ul>
</form>
</div>
</div>
<!--<input type="text" name="sample_search" id="sample_search" onkeyup="search_func(this.value);">-->
</div>
</nav>
</div>
