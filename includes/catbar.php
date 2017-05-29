<!---              Nav bar categorieën -->
<div class="catBar">
    <nav id="myNavbar" class="navbar navbar-default" role="navigation">
        <div class="container-fluid brilliantWhite">
            <a <a class=" container-fluid nav navbar-left navbar-nav fontSize16 crete textDarkGray"
                  href="./rubrieken2.php">
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
                                    <!--                                        Selecteert alle hoofdrubrieken, dus rubrieken waar rubriek gelijk is aan -1-->
                                    <?php
                                    $sql = "SELECT Rubrieknaam, Rubrieknummer FROM Rubriek WHERE Rubriek = -1 ORDER BY Rubrieknaam"; //SQL query om het uit de database te lezen
                                    $stmt = $db->prepare($sql); //Statement object aanmaken
                                    $stmt->execute();           //Statement uitvoeren
                                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) //Bij iedere  loop wordt er een tabelrij uitgelezen
                                    {
                                        $namen[] = $row[0];
                                        $nummers[] = $row[1];
                                    }
                                    for ($i = 0; $i < count($namen); $i++) {
                                        echo '<option value="' . $nummers[$i] . '"> ' . $namen[$i] . ' </option)>';
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
        </div>
    </nav>
</div>
