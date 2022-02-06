<?php
include_once('../Values/constans.php');
include_once('../Values/session.php');
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
    <script src="../Scripts/search.js"></script>
    <script src="../Scripts/search2.js"></script>

    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Stylesheets/main.css">

</head>

<body class="bg-image">
    <!-- Navbar Start-->
    <?php
    include('../Values/navbar.php');
    if ($_SESSION['adminE'] == 1) {
        echo "<script src='../Scripts/adminE.js'></script>";
    }
    ?>
    <!-- Navbar End-->

    <!-- Container Start -->
    <div class="container">

        <!-- Header Start -->
        <div class="row m-5">
            <!-- Searchbar Start-->
            <div class="search-holder col-6 d-flex justify-content-start">
                <div class="col-lg-12 col-md-6 col-sm-8">
                    <input class="form-control" id="filter" name="filter" placeholder="Szerző, cím">
                </div>
            </div>
            <!-- Searchbar End-->

            <!-- Switch Start -->
            <div class="btn-holder  col-6 d-flex justify-content-end">
                <div class="col-lg-3">
                    <form method="post">
                        <button name="list" class="btn-list btn btn-primary">
                            <i class="bi bi-table"></i>
                        </button>
                        <?php
                        if (isset($_POST['list'])) {
                            echo "<script src='../Scripts/switchToList.js'></script>";
                        } ?>
                        <button name="images" class="btn-images btn btn-secondary">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                        </button>
                        <?php
                        if (isset($_POST['images'])) {
                            echo "<script src='../Scripts/switchToImages.js'></script>";
                        } ?>
                    </form>
                </div>
            </div>
            <!-- Switch End-->
        </div>
        <!-- Header End -->

        <!-- Table View -->
        <div class="list-view col-12 books-holder row d-block">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cím</th>
                        <th>Szerző</th>
                        <th>Terjedelem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT konyvID, cim, iro, terjedelem FROM konyvek");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        foreach ($row as $col) {
                            echo "<td><a href='book.php?id=" . $row["konyvID"] . "'>" . $col . "</a></td>";
                        }
                        echo "<td>
                                <a href='book.php?id=" . $row["konyvID"] . "' class='btn btn-primary'>Megtekint</a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Image View-->
        <div class="image-view col-12 row justify-content-center d-none">
            <?php
            $result = $conn->query("SELECT konyvID, cim, iro, borito FROM  konyvek");
            while ($row = $result->fetch_assoc()) {
                echo "<a href='book.php?id=" . $row["konyvID"] . "' class='col-4'>";
                echo "<div class='eachB text-center'>";
                echo "<img src=" . $row['borito'] . " alt='borito'>";
                echo "<h4 id='cim' class='text-primary'>" . $row['cim'] . "</h4>";
                echo "<p>" . $row['iro'] . "</p>";
                echo "</div>";
                echo "</a>";
            }

            ?>
        </div>

    </div>
    <!-- Container End -->

</body>

</html>