<?php include('../Values/constans.php');
session_start();
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
    <!-- Navbar -->
    <?php
    include('../Values/navbar.php');
    if ($_SESSION['adminE'] == 1) {
        echo "<script src='../Scripts/adminE.js'></script>";
    }
    ?>

    <!-- Container Start-->
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <!-- Profil Szerkesztese Start -->
            <div class="col-lg-4 col-md-8 col-sm-10 col-10 text-center m-5">
                <h1 class="m-3">Profil Szerkesztése</h1>
                <?php
                $result = $conn->query("SELECT * FROM  kolcsonzok WHERE email='" . $_SESSION["emailaddress"] . "'")->fetch_array();
                ?>
                <form method="POST" class="text-start">
                    <label for="email" class="m-1">Email cím:</label>
                    <input type="text" name="email" class="form-control" placeholder="Email cím"
                        value="<?= $result['email'] ?>" disabled>
                    <label for="vezetek" class="m-1">Vezetéknév:</label>
                    <input type="text" name="vezetek" class="form-control" placeholder="Vezetéknév"
                        value="<?= $result['vezeteknev'] ?>">
                    <label for="kereszt" class="m-1">Keresztnév:</label>
                    <input type="text" name="kereszt" class="form-control" placeholder="Keresztnév"
                        value="<?= $result['keresztnev'] ?>">
                    <label for="felhasznalonev" class="m-1">Felhasználónév:</label>
                    <input type="text" name="felhasznalonev" class="form-control" placeholder="Felhasználónév"
                        value="<?= $result['felhasznalonev'] ?>">
                    <label for="jelszo" class="m-1">Mostani Jelszó:</label>
                    <input type="password" name="jelszo" class="form-control" placeholder="Jelszó">
                    <div class="text-center d-flex justify-content-center">
                        <div class="d-flex justify-content-center col-3 m-2">
                            <input type="submit" value="Mentés" name="submit" class="form-control btn-success m-2">
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $email = $_SESSION['emailaddress'];
                    $vezeteknev = $_POST['vezetek'];
                    $keresztnev = $_POST['kereszt'];
                    $felhasznalonev = $_POST['felhasznalonev'];
                    $jelszo = $_POST['jelszo'];
                    if (sha1($jelszo) == $result['jelszo']) {
                        $conn->query("UPDATE konyvtar.kolcsonzok SET vezeteknev = '$vezeteknev', keresztnev = '$keresztnev', felhasznalonev = '$felhasznalonev' WHERE email = '$email'");
                        echo ("<meta http-equiv='refresh' content='1'>");
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>A jelszó nem megfelelő!</div>";
                    }
                }
                ?>
            </div>
            <!-- Profil Szerkesztese End -->

            <hr>

            <!-- Foglalasok Start -->
            <div class="col-lg-8 col-md-10 col-sm-12 col-12 text-center m-5" id="foglalas">
                <h1 class="m-3">Foglalásaim</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Foglalás Azonosító</th>
                            <th>Foglalás Kezdete</th>
                            <th>Foglalás Vége</th>
                            <th>Cím</th>
                            <th>Szerző</th>
                            <th>Kiadó</th>
                            <th>Művelet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $today = date("Y.m.d");
                        $email =  $_SESSION['emailaddress'];
                        $result = $conn->query("SELECT lefoglalva.lefoglalvaID, lefoglalva.foglalasKezdete, lefoglalva.foglalasVege, konyvek.cim, konyvek.iro, konyvek.kiado FROM konyvtar.lefoglalva inner join konyvtar.konyvek on lefoglalva.konyvID = konyvek.konyvID Where lefoglalva.foglalasVege > '$today'  and lefoglalva.emailID = '$email' and lefoglalva.lefoglalva = '1' ;");
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            foreach ($row as $col) {
                                echo "<td>" . $col . "</td>";
                            }
                            echo "<td><a href='../Values/removeFogl.php?id=" . $row["lefoglalvaID"] . "' class='btn btn-primary'>Törlés</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Foglalasok End -->

        </div>
        <!-- Container End -->
    </div>
</body>