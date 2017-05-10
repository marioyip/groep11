<?php
include 'footer.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once('functies.php');

connectToDatabase();


ini_set('display_errors', 1);
global $pdo;

if (isset($_POST['submit_form'])) {
    $gelukt = "gelukt";
    $name = $_POST['name'];
    $email = $_POST['email'];

    registerUser("$name", "$email");
    echo $gelukt;
}
?>