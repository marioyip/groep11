<?php
/**
 * Created by PhpStorm.
 * User: Mario
 * Date: 8-6-2017
 * Time: 00:03
 */
session_start();

global $db;
global $pdo;
ini_set('display_errors', 1); // try turning on errors
$Per_Page = 30;  // Per Page

//Get the page number
$Page = 1;

//Determine if it is the first page

if (isset($_GET["Page"])) {
    $Page = (int)$_GET["Page"];
    if ($Page < 1)
        $Page = 1;
}

$Page_Start = (($Per_Page * $Page) - $Per_Page) + 1;  //added plus 1

$stmt = $db->prepare("
   SELECT * FROM Gebruiker;
", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$Page_End = $Page_Start + $Per_Page - 1;
$stmt->execute(array(':start' => $Page_Start, ':end' => $Page_End, ':tags' => '%e%'));
$gebruikers = $stmt->fetchAll(); // added this line

var_dump($_GET, $Page_Start, $Page_End, $Per_Page); // used to figure out what is being placed below
var_dump($gebruikers);
?>
    <ul style="">
        <?php
        foreach ($gebruikers as $row) { // change while loop to foreach
            ?>
            <li><?php echo "id: " . $row['issue_id'] . " " . $row['title']; ?></li>
            <?php
        }
        ?>
    </ul>
<?php
$stmt = $dbconn->prepare("SELECT COUNT(*) AS TotalRecords FROM Gebruiker");
$stmt->execute(array(':tags' => '%e%'));
$totalRecords = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($totalRecords);

$Num_Rows = $totalRecords["TotalRecords"];
//echo $Num_Rows;


//Declare previous/next page row guide

$Prev_Page = $Page - 1;
$Next_Page = $Page + 1;

if ($Num_Rows <= $Per_Page) {
    $Num_Pages = 1;
} else if (($Num_Rows % $Per_Page) == 0) {
    $Num_Pages = ($Num_Rows / $Per_Page);
} else {
    $Num_Pages = ($Num_Rows / $Per_Page) + 1;
    $Num_Pages = (int)$Num_Pages;
}

//Determine where the page will end

$Page_End = $Per_Page * $Page;
IF ($Page_End > $Num_Rows) {
    $Page_End = $Num_Rows;

}

//Previous page

if ($Prev_Page) {
    echo " <a class='pagination' href='$_SERVER[SCRIPT_NAME]?id=$id&Page=$Prev_Page#related'><< Back</a> ";
}

//Display total pages

for ($i = 1; $i <= $Num_Pages; $i++) {
    if ($i != $Page) {
        echo "<a class='pagination' href='$_SERVER[SCRIPT_NAME]?id=$id&Page=$i#related'>$i</a>&nbsp;";
    } else {
        echo "<b> $i </b>";
    }
}

//Create next page link

if ($Page != $Num_Pages) {
    echo " <a href ='$_SERVER[SCRIPT_NAME]?id=$id&Page=$Next_Page#related'>Next>></a> ";
}

//Adios
$sth = null;
?>