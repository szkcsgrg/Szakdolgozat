<?php
include_once('../Values/constans.php');

$_id = $_GET["id"];
if (!isset($_GET["id"])) {
    header("Location: ../Pages/books.php");
}
$_today = date("Y.m.d");

$res = $conn->query("SELECT * FROM konyvtar.lefoglalva WHERE konyvID=$_id AND lefoglalva=1 ORDER BY foglalasVege desc");
while ($row = $res->fetch_assoc()) {
    if ($row['foglalasVege'] < $_today) {
        //Lejart
        $_lefoglalvaID = $row['lefoglalvaID'];
        $conn->query("UPDATE konyvtar.lefoglalva SET lefoglalva = '2' WHERE lefoglalvaID = $_lefoglalvaID");
    } else {
        echo " ";
    }
}