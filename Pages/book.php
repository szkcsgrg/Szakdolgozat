<?php
include_once('../Values/constans.php');
include_once('../Values/automatic.php');
include_once('../Values/session.php');
$_SESSION['message'] = " ";
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Könyvtár - Könyvek</title>

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
    <!-- Navbar Start -->
    <nav class="sticky-top col-12">
        <ul>
            <div class="me-auto">
                <li class='p-3'><a href='books.php'><i class="bi bi-arrow-left"></i></a></li>
            </div>
            <div class="d-flex mx-auto">
                <li class='p-3'><a href='home.php'>Kezdőlap</a></li>
                <li class='p-3'><a href='home.php#hir'>Hírek</a></li>
                <li class='p-3'><a href='books.php'>Könyvek</a></li>
                <li class='p-3'><a href='profile.php'>Profil</a></li>
                <li class='adminE d-none p-3'><a href='admin.php'>Kezelő-Felület</a></li>
            </div>
            <div class="ms-auto">
                <li class='p-3'><a href='login.php'><i class="bi bi-box-arrow-right"></i></a></li>
            </div>
        </ul>
    </nav>
    <?php
    if ($_SESSION['adminE'] == 1) {
        echo "<script src='../Scripts/adminE.js'></script>";
    }
    ?>
    <!-- Navbar End -->

    <!-- Container Start -->
    <div class="container">
        <div class="row info-holder row d-flex justify-content-center">
            <?php
            if (!isset($_GET["id"])) {
                header("Location: ../Pages/books.php");
            }
            if (isset($_GET["id"])) {
                $_id = $_GET["id"];
                $result = $conn->query("SELECT * FROM  konyvek WHERE konyvID=" . $_GET["id"])->fetch_array();
            }
            ?>
            <!-- Borito Kep Start -->
            <div align="center" class="col-12 col-md-6 margin-bt">
                <img src="<?php echo $result["borito"] ?>" alt="kep" style="width: 70%;">
            </div>
            <!-- Borito Kep End -->

            <!-- Konyv Adatok Start -->
            <div class="col-12 col-md-6 margin-bt">
                <h1><?php echo $result["cim"] ?></h1>
                <p><span class="semantic-color">Szerző: </span><?php echo $result["iro"] ?></p>
                <p><span class="semantic-color">Kiadó: </span><?php echo $result["kiado"] ?></p>
                <p><span class="semantic-color">Terjedelem: </span><?php echo $result["terjedelem"] ?></p>
                <p><span class="semantic-color">Kiadás Dátuma: </span><?php echo $result["kiadasDatuma"] ?></p>
                <p><span class="semantic-color">Leírás: </span><?php echo $result["leiras"] ?></p>

                <!-- Lefoglalas -->
                <div class="col-12">
                    <form action="../Values/lefoglalom.php?id=<?= $_id ?>" method="post"
                        onsubmit="return confirm('Biztos le szeretné foglalni ezt a könyvet?');">
                        <?php
                        echo "<script src='../Scripts/jquery.min.js'></script>";
                        $_lefoglalva = "";
                        $res = $conn->query("SELECT * FROM konyvtar.lefoglalva Where konyvID = $_id Order By foglalasKezdete desc Limit 1");
                        while ($row = $res->fetch_assoc()) {
                            $_lefoglalva = $row['lefoglalva'];
                        }

                        if ($_lefoglalva == 1) {
                            echo "<script src='../Scripts/btnDisable.js'></script> ";
                            echo "<div class='alert alert-primary' role='alert'>A könyv lefoglalt állapotban van. Az ön foglalásait <a href='../Pages/profile.php#foglalas'>itt</a> éri el.</div>";
                        }
                        if ($_lefoglalva == 0 || $_lefoglalva == 2) {
                            echo "<script src='../Scripts/btnEnable.js'></script> ";
                        }
                        ?>
                        <input type="submit" value="Lefoglalom" class="btn btn-primary lefoglalom"></input>
                    </form>
                </div>
            </div>
            <!-- Konyv Adatok End -->

            <!-- Megjegyzesek Start -->
            <div class="col-12 margin-bt text-center">
                <div class='text-center'>
                    <h1>Megjegyzések</h1>
                </div>
                <!-- Uj megjegyzes -->
                <form method="POST" class="margin-1 row justify-content-center align-items-center">
                    <div class="col-10 col-md-6 col-lg-6 col-xl-8">
                        <textarea type='text-area' name='newcom' class='form-control' rows='2'
                            placeholder='Új megjegyzés'></textarea>
                    </div>
                    <div class="col-3 col-md-2 col-lg-2 col-xl-1">
                        <input type="submit" name="mentes" value="Mentés" class="btn btn-primary">
                    </div>
                    <?php
                    if (isset($_POST['mentes'])) {
                        $email =  $_SESSION['emailaddress'];
                        $_id = $_GET["id"];
                        $velemeny = $_POST["newcom"];
                        $date = date("Y.m.d");
                        if (empty($_POST['newcom'])) {
                            $_SESSION['message'] = "Nem töltötte ki a mezőt!";
                        } else {
                            $conn->query("INSERT INTO velemenyek(emailID,konyvID,velemeny, datum) VALUES('$email', '$_id', '$velemeny', '$date')");
                            $_SESSION['message'] = "<div class='alert alert-primary col-6' role='alert'>Mentettük a megjegyzését. Megjegyzése elbírálás alá kerül.</div>";
                        }
                    }
                    ?>
                </form>


                <!-- Errors Start -->
                <div class="response text-center d-flex justify-content-center">
                    <?php
                    echo $_SESSION['message'];
                    ?>
                </div>
                <!-- Errors End -->

                <!-- Comments Start-->
                <div class="comments row justify-content-center">
                    <?php
                    if (isset($_GET["id"])) {
                        $result = $conn->query("SELECT felhasznalonev, velemeny FROM konyvtar.velemenyek INNER JOIN konyvtar.kolcsonzok on kolcsonzok.email = velemenyek.emailID WHERE konyvID=" . $_GET["id"] . " AND allowed='1' Order By datum desc Limit 3") or die($conn->error);
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='comment col-10 justify-content-left'>";
                            foreach ($row as $col) {
                                echo "<div class='sor'>" . $col . "</div>";
                            }
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
                <!-- Comments End -->
            </div>
            <!-- Megjegyzesek End -->
        </div>
    </div>
    <!-- Container End-->

</body>

</html>