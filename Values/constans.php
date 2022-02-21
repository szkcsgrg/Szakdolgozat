<?php
/*
    define('Host', 'localhost'); //Adatbazis cim
    define('DB_Username', 'root'); //Adatbazis felhasznalonev
    define('DB_Password', ''); //Adatbazis jeszo
    define('DB_Name', 'konyvtar'); // Adatbazis nev
*/

define('Host', '127.0.0.1');
define('DB_Username', 'root');
define('DB_Password', 'titok1234');
define('DB_Name', 'konyvtar');

$conn = mysqli_connect(Host, DB_Username, DB_Password);
$db_select = mysqli_select_db($conn, DB_Name);
$salt = "2347zhuifh4thiunefkrujfslrfsurf8hgishcds87";