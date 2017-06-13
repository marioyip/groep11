<?php
session_start();
unset($_SESSION['username']);
$_SESSION['ingelogd'] = false;
header('Location: index.php');
exit;
