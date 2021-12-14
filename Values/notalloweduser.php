<?php
session_start();
$email =  $_SESSION['emailaddress'];
if (empty($email)) {
    echo "<h1>Illetéktelen belépés</h1> ";
    Header("Location: ../Pages/home.php");
}