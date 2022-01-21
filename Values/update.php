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

    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Stylesheets/main.css">

</head>

<body class="bg-image">
    <nav class="sticky-top col-12">
        <ul class='d-flex'>
            <div class="me-auto">
                <li class='p-3'><a onclick="history.back()"><i class="bi bi-arrow-left"></i></a></li>
            </div>
            <div class="ms-auto">
                <li class=' p-3'><a href='login.php'><i class="bi bi-box-arrow-right"></i></a></li>
            </div>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="POST">
                    <?php
                    if (isset($_GET["id"])) {
                        include_once '../Values/constans.php';
                        $result = $conn->query("SELECT * FROM  konyvtar.hirek WHERE idhirek=" . $_GET["id"] . "")->fetch_array();
                    } ?>
                    <br>
                    <input type='text' name='id' class='form-control' placeholder='ID' value="<?= $result["idhirek"] ?>"
                        disabled readonly>
                    <input type='text' name='tittle' class='form-control' placeholder='Cím'
                        value="<?= $result["tittle"] ?>">
                    <textarea type='text-area' name='text' class='form-control' rows='3'
                        placeholder='Szöveg'><?= $result["text"] ?></textarea>

                    <input type='text' name='date' class='form-control' placeholder='Dátum'
                        value="<?= $result["date"] ?>" disabled readonly>
                    <input type='text' name='editorID' class='form-control' placeholder='Szerkesztő'
                        value="<?= $result["editorID"] ?>" disabled readonly>
                    <br>
                    <input type='submit' name='submit' value='Mentés' class='btn btn-success'>
                </form>
            </div>
            <?php
            if (isset($_POST["submit"])) {
                $_idhirek = $_GET["id"];
                $_tittle = $_POST["tittle"];
                $_text = $_POST["text"];
                $_date = date("Y.m.d");
                session_start();
                $_editorID = $_SESSION["emailaddress"];


                //echo "UPDATE  hirek  SET tittle='$_tittle' ,  text='$_text' ,  date='$_date' , editorID='$_editorID' WHERE idhirek='$_idhirek'";
                $result = $conn->query("UPDATE  hirek  SET tittle='$_tittle' ,  text='$_text' ,  date='$_date' , editorID='$_editorID' WHERE idhirek='$_idhirek'");
                header("Refresh:0");
            }
            ?>
        </div>
    </div>
</body>