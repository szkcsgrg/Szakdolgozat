<?php
/*
    Pc Settings:
    define('Host', 'localhost');
    define('DB_Username', 'root');
    define('DB_Password', '');
    define('DB_Name', 'konyvtar');
*/
// Mac settings:
define('Host', '127.0.0.1');
define('DB_Username', 'root');
define('DB_Password', 'titok1234');
define('DB_Name', 'konyvtar');

$conn = mysqli_connect(Host, DB_Username, DB_Password);
$db_select = mysqli_select_db($conn, DB_Name);