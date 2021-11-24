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

<body class="bg-image">
    <!-- Navbar -->
    <?php include('../Values/navbar.php'); ?>

    <!-- Container -->
    <div class="container">
        <div class="row info-holder row d-flex justify-content-center">
            <?php
                if(isset($_GET["id"])){
                    $result = $conn -> query ("SELECT * FROM  konyvek WHERE konyvID=".$_GET["id"])->fetch_array();
                }
            ?>
            <div align="center" class="col-12 col-md-6 margin-bt">
                <img src="<?php echo $result["borito"] ?>" alt="kep" style="width: 70%;">
            </div>
            <div class="col-12 col-md-6 margin-bt">
                <h1><?php echo $result["cim"] ?></h1>
                <p><span class="semantic-color">Szerző: </span><?php echo $result["iro"] ?></p>
                <p><span class="semantic-color">Kiadó: </span><?php echo $result["kiado"] ?></p>
                <p><span class="semantic-color">Terjedelem: </span><?php echo $result["terjedelem"] ?></p>
                <p><span class="semantic-color">Kiadás Dátuma: </span><?php echo $result["kiadasDatuma"] ?></p>
                <p><span class="semantic-color">Leírás: </span><?php echo $result["leiras"] ?></p>

                <!-- Lefoglalas, Kedvencekhez ad , Megjeloles olvasott kent -->
                <div class="col-12">
                    <button class="btn btn-primary">Lefoglalom</button>
                    #warning Lefoglalom
                </div>

            </div>
            <div class="col-12 margin-bt">
                <!-- Megjegyzesek -->
                <?php 
                    $sql = "SELECT emailID, velemeny, reakcio FROM  velemenyek WHERE konyvID=".$_GET["id"]." Order By date desc Limit 6 ";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    if($count > 0){
                        echo "<div class='text-center'>
                                    <h1>Megjegyzések</h1>
                                </div>";
                    }
                ?>
                <!-- Uj megjegyzes -->
                #warning Uj megjegyzes

                <!-- Comments -->
                <div align="center" class="comments">
                    <?php
                        if(isset($_GET["id"])){
                            $result = $conn -> query ("SELECT emailID, velemeny, reakcio FROM  velemenyek WHERE konyvID=".$_GET["id"]." Order By date desc Limit 6 ");
                        
                            while($row = $result -> fetch_assoc()){                        
                                echo "<div class='comment col-10'>";
                                foreach($row as $col){
                                    echo "<div class='row'>".$col."</div>";
                                }
                                echo "</div>";
                            }
                        }
                ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php include('../Values/footer.php'); ?>
</body>

</html>