<?php
include_once('../Values/constans.php');
include_once('../Values/session.php');
$email =  $_SESSION['emailaddress'];
$re = $conn->query("SELECT adminE FROM  kolcsonzok WHERE email = '$email'")->fetch_array();
$_SESSION['adminE'] = $re['adminE'];
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <!-- Basics -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Könyvtár - Kezdőlap</title>


    <!-- Srcipts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../Scripts/jquery.min.js"></script>


    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Stylesheets/main.css">

</head>

<body class="bg-image">
    <!-- Navbar -->
    <?php
    include('../Values/navbar.php');
    if ($_SESSION['adminE'] == 1) {
        echo "<script src='../Scripts/adminE.js'></script>";
    }
    ?>

    <!-- Container Start -->
    <div class="container-fluid">

        <!-- Welcome  Message Start-->
        <div class="welcome-holder row text-center">
            <h1>Üdv
                <?php
                $result = $conn->query("SELECT * FROM  kolcsonzok WHERE email = '$email'")->fetch_array();
                echo $result['keresztnev'];
                ?>!
            </h1>
            <h2>
                <a href="books.php">Keressen</a> számára megfelelő könyvet!
            </h2>
        </div>
        <!-- Welcome  Message End-->

        <!-- News Feed Start -->
        <div class="news-holder row d-flex justify-content-center">
            <div class="text-center" id="hir">
                <h1 class="col-12">Könyvtárunk Hírei</h1>
            </div>
            <?php
            $result = $conn->query("SELECT tittle, text, date FROM konyvtar.hirek Order By date desc Limit 6;");
            while ($row = $result->fetch_assoc()) {
                echo "<div class='news col-10 col-md-4 col-lg-3'>";
                echo "<div class='item tittle'>" . $row['tittle'] . "</div>";
                echo "<div class='item text' style='white-space:pre-wrap'>" . $row['text'] . "</div>";
                echo "<div class='item date'>" . $row['date'] . "</div>";
                echo "</div>";
            }
            ?>
        </div>
        <!-- News Feed End -->

    </div>
    <!-- Container End -->
</body>

</html>