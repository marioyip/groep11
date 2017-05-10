<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once('functies.php');

connectToDatabase();


ini_set('display_errors', 1);
global $pdo;

if(isset($_POST['submit_form'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    insertUserInDatabase("$name", "$email");

}

?>