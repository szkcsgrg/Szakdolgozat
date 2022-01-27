<?php
if (isset($_GET["id"])) {
    include_once "../Values/constans.php";
    $_id = $_GET["id"];
    $result = $conn->query("UPDATE  konyvtar.velemenyek SET allowed = '0' WHERE (velemenyID = '$_id')");
    header("Location: ../Pages/admin.php");
}