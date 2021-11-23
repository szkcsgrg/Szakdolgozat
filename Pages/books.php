<?php include('../Values/constans.php'); session_start();?>

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


    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Stylesheets/main.css">

</head>

<body>
    <!-- Navbar -->
    <?php include('../Values/navbar.php'); ?>

    <!-- Container -->
    <div class="container">
        <div class="search-holder row">
            <div class="col-6">
                <input class="form-control" id="filter" name="filter" placeholder="Szűrés">
            </div>
        </div>
        <div class="books-holder row">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cím</th>
                        <th>Szerző</th>
                        <th>Kiadó</th>
                        <th>Terjedelem</th>
                        <th>Borító</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $result = $conn -> query("SELECT konyvID, cim, iro, kiado, terjedelem, borito FROM konyvek");
                     while($row = $result -> fetch_assoc()){
                         //var_dump($row);
                         echo "<tr>";
                            foreach($row as $col){
                                echo "<td>".$col."</td>";
                            }
                            $kep = $row["borito"];
                            echo $kep;
                            echo "<img src='../Images/$kep' alt='kep'>";
                            echo "<td>
                                <a href='update.php?id=".$row["konyvID"]." ' class='btn btn-warning'>Szerekesztés</a>
                            </td>";
                         echo "</tr>";
                         
                     }
                 ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Footer -->
    <?php include('../Values/footer.php'); ?>

    <!-- Scripts -->
    <script src="../Scripts/jquery.min.js"></script>
    <script src="../Scripts/app.js"></script>
</body>

</html>