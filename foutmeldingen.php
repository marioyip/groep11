<?php
$user = $_SESSION['username'];
//start de sessie
session_start();

//sessie verwijderen
session_destroy();
$_SESSION['username'] = $user;
header('Location: inloggen.php');