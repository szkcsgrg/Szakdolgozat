<?php
include_once('../Values/constans.php');
include_once('../Values/session.php');
if (!isset($_SESSION['adminE'])) {
    header("Location: ../Pages/home.php");
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Könyvtár - Admin felület</title>

    <!-- Srcipts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../Scripts/jquery.min.js"></script>
    <script src="../Scripts/showA.js"></script>

    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Stylesheets/main.css">

</head>

<body class="bg-image">
    <!-- Navbar Start-->
    <nav class="sticky-top col-12">
        <ul>
            <div class="me-auto d-flex">
                <li class='p-3'><a onclick="history.back()"><i class="bi bi-arrow-left"></i></a></li>
            </div>
            <div class="d-flex mx-auto">
                <li class="p-3"><a href="javascript:showHirek();">Hírek</a></li>
                <li class="p-3"><a href="javascript:showHozz();">Hozzászólások</a></li>
                <li class="p-3"><a href="javascript:showFogl();">Foglalások</a></li>
                <li class="p-3"><a href="javascript:showJelszo();">Jelszómódósítás</a></li>
            </div>
            <div class="ms-auto">
                <li class=' p-3'><a href='login.php'><i class="bi bi-box-arrow-right"></i></a></li>
            </div>
        </ul>
    </nav>
    <!-- Navbar End -->

    <!-- Container Start-->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Hírek Start -->
            <div id="hirek" class="col-10 d-none">
                <div class="news-holder row d-flex justify-content-center">
                    <div class="text-center" id="hir">
                        <h1 class="col-12 p-2">Hírek</h1>
                    </div>
                    <?php
                    $result = $conn->query("SELECT idhirek, tittle, text, date FROM konyvtar.hirek Order By date desc Limit 6;");
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='news col-10 col-md-4 col-lg-3'>";
                        echo "<a href='../Values/update.php?id=" . $row["idhirek"] . " '>
                                    <i class='bi bi-pencil-fill' id='pen'></i>
                                </a>";
                        echo "<a href='../Values/remove.php?id=" . $row["idhirek"] . " '>
                                    <i class='bi bi-trash-fill' id='bin'></i>
                                </a>";
                        echo "<div class='item tittle'>" . $row['tittle'] . "</div>";
                        echo "<div class='item text' style='white-space:pre-wrap'>" . $row['text'] . "</div>";
                        echo "<div class='item date'>" . $row['date'] . "</div>";
                        echo "</div>";
                    }
                    ?>
                    <div class="text-center m-3">
                        <button id="newbtn">
                            <a href="../Values/create.php">
                                <h2><i class="bi bi-plus-lg fa-4x"></i></h2>
                            </a>
                        </button>
                    </div>
                </div>

            </div>
            <!-- Hírek End -->

            <!-- Hozzászólások Start -->
            <div id="hozzaszolasok" class="col-10 d-none">
                <div class="news-holder row d-flex justify-content-center">
                    <div class="text-center" id="hir">
                        <h1 class="col-12 p-2">Hozzászólások</h1>
                    </div>
                    <?php
                    $result = $conn->query("SELECT * FROM (konyvtar.velemenyek Inner join konyvtar.konyvek on velemenyek.konyvID = konyvek.konyvID) inner join konyvtar.kolcsonzok on velemenyek.emailID = kolcsonzok.email Where allowed is null");
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='news col-10 col-md-4 col-lg-3'>";
                        echo "<a href='../Values/save.php?id=" . $row["velemenyID"] . " '>
                                    <i class='bi bi-check-lg' id='pen'></i>
                                </a>";
                        echo "<a href='../Values/delete.php?id=" . $row["velemenyID"] . " '>
                                    <i class='bi bi-trash-fill' id='bin'></i>
                                </a>";
                        echo "<div class='item tittle'>" . $row['felhasznalonev'] . "</div>";
                        echo "<div class='item utittle'>(" . $row['emailID'] . ")</div>";
                        echo "<br>";
                        echo "<div class='item text' style='white-space:pre-wrap'>" . $row['cim'] . " - " . $row['velemeny'] . "</div>";
                        echo "<div class=' item date'>" . $row['datum'] . "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            <!-- Hozzászólások Start -->

            <!-- Foglalások Start -->
            <div id="foglalasok" class="col-10 d-none">
                <div class="news-holder row d-flex justify-content-center">
                    <div class="text-center" id="hir">
                        <h1 class="col-12 p-2">Foglalások</h1>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Foglaló</th>
                                <th>Foglalás Kezdete</th>
                                <th>Foglalás Vége</th>
                                <th>Könyv ID</th>
                                <th>Cím</th>
                                <th>Szerző</th>
                                <th>Kiadó</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $today = date("Y.m.d");
                            $result = $conn->query("SELECT lefoglalva.emailID, lefoglalva.foglalasKezdete, lefoglalva.foglalasVege, konyvek.konyvID, konyvek.cim, konyvek.iro, konyvek.kiado FROM konyvtar.lefoglalva inner join konyvtar.konyvek on lefoglalva.konyvID = konyvek.konyvID Where lefoglalva.foglalasVege > '$today' and lefoglalva.lefoglalva = '1';");
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                foreach ($row as $col) {
                                    echo "<td>" . $col . "</td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Foglalások End -->

            <!-- Jelszómódósítás Start -->
            <div id="jelszo" class="col-10 d-none">
                <div class="news-holder row d-flex justify-content-center">
                    <div class="text-center" id="hir">
                        <h1 class="col-12 p-2">Jelszómódósítás</h1>
                    </div>
                    <form method="POST" class="col-4 text-center">
                        <!-- <input type="text" name="email" class="form-control m-3" placeholder="Email cím"> -->
                        <select name="email" class="form-select m-3" placeholder="Email cím">
                            <?php
                            $result = $conn->query("SELECT emailID FROM tickets WHERE done like '1'");
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=" . $row['emailID'] . ">" . $row['emailID'] . "</option>";
                                /*foreach ($row as $col) {
                                    echo "<option value=" . $row['emailID'] . "></option>";
                                }*/
                            }
                            ?>
                        </select>
                        <input type="password" name="newjelszo" class="form-control m-3" placeholder="Új jelszó"
                            pattern=".{8,}" title="8 vagy több karakter" required>
                        <input type="password" name="newjelszore" class="form-control m-3" placeholder="Új jelszó újra"
                            pattern=".{8,}" title="8 vagy több karakter" required>
                        <input type="submit" value="Mentés" name="submit" class="btn btn-success m-3">
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $email = $_POST['email'];
                        $newjelszo = $_POST['newjelszo'];
                        $newjelszore = $_POST['newjelszore'];
                        $jelszo = "NULL";
                        if ($newjelszo == $newjelszore) {
                            $jelszo = sha1($newjelszo) . $salt;

                            $conn->query("UPDATE `konyvtar`.`kolcsonzok` SET `jelszo` = '$jelszo' WHERE (`email` = '$email');");
                            $conn->query("UPDATE `konyvtar`.`tickets` SET `done` = '0' WHERE (`emailID` = '$email')");
                            echo "<script>alert('Jelszó frissítve.')</script>";
                        } else {
                            echo "<script>alert('A két jelszó nem egyezik.')</script>";
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- Jelszómódósítás End -->

        </div>
    </div>
    <!-- Container End-->
</body>


</html>