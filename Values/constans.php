<?php 
    define('Host', 'localhost');
    define('DB_Username', 'root');
    define('DB_Password', '');
    define('DB_Name', 'konyvtar');

    //Connect Database
    $conn = mysqli_connect(Host, DB_Username, DB_Password) or die(mysqli_error());
    //Select Database
    $db_select = mysqli_select_db($conn, DB_Name) or die (mysqli_error());
?>