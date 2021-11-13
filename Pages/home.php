<?php include('../Values/constans.php'); session_start();?>
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


    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Stylesheets/main.css">

</head>

<body>
    <!-- Navbar -->
    <?php include('../Values/navbar.php'); ?>

    <!-- Container -->
    <div class="container-fluid px-0 d-flex justify-content-center">
        <div class="row">
            <!-- Welcome  Message -->
            <div class="welcome-holder col-12">
                <h1>Üdv
                    <?php 
                        $email =  $_SESSION ['emailaddress']; 
                        
                        $sql = "SELECT  keresztnev FROM  `kolcsonzok` WHERE  email = '$email'";
                        //Execute the query
                        $result = mysqli_query($conn, $sql);
        
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                foreach ($row as $field) {
                                    echo $field;
                                }
                            }
                        }
                    ?>!
                </h1>
                <h2>
                    <a href="books.php">Keressen</a> számára megfelelő könyvet!
                </h2>
            </div>

            <!-- News Feed -->
            <div class="news-holder col-12 min-vh-100">

            </div>
        </div>
    </div>

    <?php include('../Values/footer.php'); ?>
    <script src="../Scripts/Hamburger.js"></script>
</body>

</html>