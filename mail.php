<?php
/**
 * Created by PhpStorm.
 * User: Mario
 * Date: 17-5-2017
 * Time: 13:15
 */

if (isset($_POST['submit']))
{
    require "dbc.php";

    $gebruikersnaam = mysqli_real_escape_string($_POST['gebruikersnaam']);
    $email = mysqli_real_escape_string($_POST['email']);
    $wachtwoord = mysqli_real_escape_string($_POST['wachtwoord']);

    $enc_wachtwoord = md5($wachtwoord);

    if ($username && $email && $wachtwoord)
    {
        $bevestigingscode = rand();
        $query = mysqli_query("INSERT INTO 'Gebruikersnaam'")
    }
}

?>