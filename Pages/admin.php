<?php
include('../Values/constans.php');
session_start();
?>

<!DOCTYPE html>
<html lang="hu">

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
    <nav class="sticky-top col-12">
        <ul>
            <div class="me-auto d-flex">
                <li class='p-3'><a onclick="history.back()"><i class="bi bi-arrow-left"></i></a></li>
            </div>
            <div class="d-flex mx-auto">
                <li class="p-3"><a href="javascript:showHirek();">Hírek</a></li>
                <li class="p-3"><a href="javascript:showHozz();">Hozzászólások</a></li>
                <li class="p-3"><a href="javascript:showFogl();">Foglalások</a></li>
            </div>
            <div class="ms-auto">
                <li class=' p-3'><a href='login.php'><i class="bi bi-box-arrow-right"></i></a></li>
            </div>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div id="hirek" class="col-10 d-none">
                <div class="news-holder row d-flex justify-content-center">
                    <div class="text-center" id="hir">
                        <h1 class="col-12">Hírek</h1>
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
            <div id="hozzaszolasok" class="col-10 d-none">
                <h2>Hozzászólások</h2>
            </div>
            <div id="foglalasok" class="col-10 d-none">
                <h2>Foglalások</h2>
            </div>
        </div>
    </div>
</body>


</html>