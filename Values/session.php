<?php
session_start();
if (!isset($_SESSION['emailaddress'])) {
    header("Location: ../Pages/login.php");
}