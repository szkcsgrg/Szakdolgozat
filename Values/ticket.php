<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Könyvtár - Elfelejtett jelszó</title>

    <!-- Srcipts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Stylesheets/main.css">

</head>

<body class="bg-image">
    <!-- Navbar Start -->
    <nav class="sticky-top col-12">
        <ul class='d-flex'>
            <div class="me-auto">
                <li class='p-3'><a href="../Pages/login.php"><i class="bi bi-arrow-left"></i></a></li>
            </div>
        </ul>
    </nav>
    <!-- Navbar End -->

    <!-- Container Start -->
    <div class="container-fluid text-center">
        <div class="row justify-content-center text-center m-4">
            <h1 class="m-5">Jelszó Módósítás</h1>
            <p>A jelszó módósítás biztonsági okokból csak a könyvtárban valósítható meg. <br> Adja meg fiókja email
                címét!</p>
            <form method="POST" class="col-4">
                <input type='text' name='email' class='form-control m-2' placeholder='Email cím'>
                <input type='submit' name='submit' value='Küldés' class='btn btn-success m-2'>
            </form>
            <?php
            if (isset($_POST['submit']) && isset($_POST['email'])) {
                include_once "../Values/constans.php";
                $today = date("Y.m.d.");
                $email = $_POST['email'];
                $conn->query("INSERT INTO `konyvtar`.`tickets` (`emailID`, `datum`) VALUES ('" . $email . "', '" . $today . "');");
                echo "Jelszó módósítási kérését mentettük. <br> Fáradjon be a könyvtárba a további lépésekért!";
            }
            ?>
        </div>
    </div>
    <!-- Container End -->
</body>