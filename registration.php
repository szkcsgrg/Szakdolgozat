<!-- Included PHP's -->
<?php 
    include('Values/constans.php');
    session_start();
    $_SESSION["errorpassword"] = " ";
    $_SESSION["errorfield"] = " ";


    if(isset($_POST['submit']))
    {
        //Values
        $result = 0;
        $ableToUpload = false;
        
        $email = $_POST['email'];
        $_SESSION["emailaddress"]=$email;
        $vezeteknev = $_POST['vezeteknev'];
        $keresztnev = $_POST['keresztnev'];
        $felhasznalonev = $vezeteknev.' '.$keresztnev;
        $jelszo = "NULL";
        if($_POST['jelszo'] == $_POST['jelszoujra']){
            $jelszo = sha1($_POST['jelszo']);
            $ableToUpload = true;
        }else{
            // A két jelszó nem egyezik!
            $_SESSION["errorpassword"] = "A két jelszó nem egyezik!";
        }
        
        
        if (empty($_POST["email"]) || 
            empty($_POST["vezeteknev"]) || 
            empty($_POST["keresztnev"]) ||
            empty($_POST["jelszo"]) ||
            empty($_POST["jelszoujra"])
            ){
            $ableToUpload = false;

            //Töltsön ki minden mezőt!
            $_SESSION["errorfield"] = "Töltsön ki minden mezőt!";
            
            $email = clean_data($_POST["email"]);
            $vezeteknev = clean_data($_POST["vezeteknev"]);
            $keresztnev = clean_data($_POST["keresztnev"]);
            $jelszo = clean_data($_POST["jelszo"]);
            $jelszo = clean_data($_POST["jelszoujra"]);
        }
        
        //Insert Into
        $sql = "INSERT INTO  kolcsonzok SET
            email = '$email',
            vezeteknev = '$vezeteknev',
            keresztnev = '$keresztnev',
            felhasznalonev = '$felhasznalonev',
            jelszo = '$jelszo'
        ";
        
        
        //Execute data to DB
        if($ableToUpload == true)
        {
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)) ;
            header("Location: Pages/home.php");
            die();
        }
    }
    function clean_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <!-- Basics -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Könyvtár - Regisztráció</title>

    <!-- Srcipts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Stylesheets/main.css">

</head>

<body class="bg-image">
    <!-- Container -->
    <div class="container-fluid px-0">
        <div class="row">
            <!-- Texts - Form -->
            <div class="reg-holder col-12 col-lg-6 min-vh-100">
                <div class="text-holder">
                    <h1>Online Könyvtár</h1>
                </div>
                <div class="form-holder">
                    <h2>Regisztrálás</h2>
                    <p><a href="Pages/login.php">Már regisztráltam</a></p>
                    <form action="" method="POST">
                        <input class="input-text" type="text" name=email placeholder="Email cím">
                        <br>
                        <input class="input-text" type="text" name=vezeteknev placeholder="Vezetéknév">
                        <br>
                        <input class="input-text" type="text" name=keresztnev placeholder="Keresztnév">
                        <br>
                        <input class="input-text" type="password" name=jelszo placeholder="Jelszó">
                        <br>
                        <input class="input-text" type="password" name=jelszoujra placeholder="Jelszó újra">
                        <br>

                        <input class="input-button" type="submit" name="submit" value="Regisztrálok">
                    </form>
                    <div class="error-messages">
                        <?php
                            echo "</br>". $_SESSION["errorpassword"];
                            echo "</br>". $_SESSION["errorfield"];
                        ?>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="map-holder d-none d-lg-block col-lg-6 w-50">
                <iframe class="map min-vh-100 w-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1135.413609398791!2d16.711084232036345!3d47.402502149287066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476ea5d09c58ec15%3A0xa5d80a76892bc73e!2zTsOhZGFzZHkgVGFtw6FzIEvDtnpnYXpkYXPDoWdpLCBJbmZvcm1hdGlrYWksTcWxc3pha2kgU3pha2vDtnrDqXBpc2tvbGEsU3pha2lza29sYSDDqXMgS29sbMOpZ2l1bQ!5e0!3m2!1shu!2shu!4v1635077447001!5m2!1shu!2shu"
                    frameborder="0" style="border:0;" allowfullscreen="none" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</body>

</html>