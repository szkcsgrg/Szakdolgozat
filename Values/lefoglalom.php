<?php
include_once('../Values/constans.php');
session_start();
$email =  $_SESSION['emailaddress'];
$_id = $_GET["id"];
$_today = date("Y.m.d");
$_today = strtotime("+7 day");
$_daysLater = date('Y.m.d', $_today);
$_today = date("Y.m.d");

$conn->query("INSERT INTO konyvtar.lefoglalva(emailID,konyvID,foglalasKezdete, foglalasVege, lefoglalva) VALUES('$email', '$_id', '$_today', '$_daysLater', '1')");
$_SESSION['lefoglalta'] = "Sikeresen lefoglalta.";
header("Location: ../Pages/book.php?id=" . $_id);