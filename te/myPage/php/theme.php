<?php
    session_start();
    if ($_SESSION["log"] != 'Admin' || $_SESSION["pass"] != "Admin20210928") {
        header('Location:../register.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тема</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/all.css">
    <link rel="stylesheet" href="../../css/fonts.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/style2.css">
    <link rel="stylesheet" href="../../css/cssfile.css">
	<link rel="stylesheet" href="../../css/x.css">
	<link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <?php include("./menu.php"); include("./connect.php");?>
    <div class="container homeContainer">
        <form action="" method="post" class="form-control" enctype="multipart/form-data">
            <hr>
            <table class="table">
                <?php
                    $id = $_GET["id"];
                    $type = $_GET["type"];
                    $r = $conn -> query("SELECT * FROM kursThemeLessons WHERE id = '$id'");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        $row = mysqli_fetch_array($r);
                        
                            echo '
                              <div class="form-control btn btn-success"><h2 class = "fas fa-sliders"> Сабакты озорту</h2> </div>
                              ';
                        do {
                            echo '
                            <div class="p-5 text-center">
                                <input type="text" name="theme" id="theme" class="form-control" placeholder = "Сабакка тема ..." value="'.$row["aty"].'" required>
                                <br>
                                 <br><p class=""><button type="submit" name="submit5" class=" btn btn-outline-success"> <i class="fas fa-hdd-o"> Сохранить</i> </button> </p>           
                            </div>
                            ';
                        } while($row = mysqli_fetch_array($r));
                    }
                ?>
            </table>
        </form>
    </div>
    <?php include("./update.php");?>
	<script src="./js/jquery.js"></script>
    <script src="./js/menu.js"></script>
    <script>
    </script>
</body>
</html>