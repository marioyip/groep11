<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once('functies.php');

connectToDatabase();


ini_set('display_errors', 1);
global $pdo;

if (isset($_GET['submit_form'])) {
    $gelukt = "gelukt";
    $name = $_GET['name'];
    $email = $_GET['email'];

    insertUserInDatabase("$name", "$email");
    echo $gelukt;
}
?>