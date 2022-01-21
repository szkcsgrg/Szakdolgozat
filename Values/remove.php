<?php
if (isset($_GET["id"])) {
    include_once "../Values/constans.php";
    $_id = $_GET["id"];
    $result = $conn->query("DELETE FROM hirek WHERE idhirek='$_id'");
    header("Location: ../Pages/admin.php");
}