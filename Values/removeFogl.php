<?php
if (isset($_GET["id"])) {
    include_once "../Values/constans.php";
    $_id = $_GET["id"];
    $result = $conn->query("UPDATE `konyvtar`.`lefoglalva` SET `lefoglalva` = '2' WHERE (`lefoglalvaID` = '$_id');");
    header("Location: ../Pages/profile.php#foglalas");
}