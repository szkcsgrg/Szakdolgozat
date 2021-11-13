<!-- Included PHP -->
<?php
    include('../Values/constans.php');   
    session_start();
    $_SESSION["errordata"] = " ";
    $_SESSION["errorfield"]= " ";

    if(isset($_POST['submit']))
    {
        //Values
        $email = $_POST['email'];
        $jelszo = sha1($_POST['jelszo']);
        $_SESSION["emailaddress"]=$email;
        
        //Select From
        $sql = "SELECT  * FROM `kolcsonzok`WHERE  email = '$email' AND jelszo = '$jelszo'";
        
        //Execute the query
        $result = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($result);
        if($count == 1)
        {
            header("Location: home.php");
        }
        else{
            //Ellenőrízze, beírt adatait!
            $_SESSION["errordata"] ="Ellenőrízze, beírt adatait!";
        }
        

        if (empty($_POST["email"]) || 
            empty($_POST["jelszo"])
            ){
            $ableToUpload = false;
            //Töltsön ki minden mezőt!
            $_SESSION["errorfield"] ="Töltsön ki minden mezőt!";
            $email = clean_data($_POST["email"]);
            $jelszo = clean_data($_POST["jelszo"]);
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
    <title>Könyvtár - Belépés</title>

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
    <!-- Container -->
    <div class="container-fluid px-0">
        <div class="row">
            <!-- Texts - Form -->
            <div class="reg-holder col-12 col-lg-6 min-vh-100">
                <div class="text-holder">
                    <h1>Online Könyvtár</h1>
                </div>
                <div class="form-holder">
                    <h2>Belépés</h2>
                    <p><a href="../registration.php">Még nincs fiókom</a></p>
                    <form action="" method="POST">
                        <input class="input-text" type="text" name=email placeholder="Email cím">
                        <br>
                        <input class="input-text" type="password" name=jelszo placeholder="Jelszó">
                        <br>
                        <input class="input-button" type="submit" name="submit" value="Belépés">
                    </form>
                    <div class="error-messages">
                        <?php
                            echo "</br>". $_SESSION["errordata"];
                            echo "</br>". $_SESSION["errorfield"];
                        ?>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="map-holder d-none d-lg-block col-lg-6 w-50">
                <iframe class="map min-vh-100 w-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1135.413609398791!2d16.711084232036345!3d47.402502149287066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476ea5d09c58ec15%3A0xa5d80a76892bc73e!2zTsOhZGFzZHkgVGFtw6FzIEvDtnpnYXpkYXPDoWdpLCBJbmZvcm1hdGlrYWksTcWxc3pha2kgU3pha2vDtnrDqXBpc2tvbGEsU3pha2lza29sYSDDqXMgS29sbMOpZ2l1bQ!5e0!3m2!1shu!2shu!4v1635077447001!5m2!1shu!2shu"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</body>

</html>