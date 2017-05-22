<?php
session_start();
unset($_SESSION['gebruiker']);
header('Location: index.php');
exit;
?>