<?php
    session_start();
    if ($_SESSION["log"] != 'Admin' || $_SESSION["pass"] != "Admin20210928") {
        header('Location:./register.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JRT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/cssfile.css">
	<link rel="stylesheet" href="../css/x.css">
	<link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <?php include("menu.php"); include("./php/connect.php");?>
    <div class="container homeContainer">
        <form action="" method="post" class="form-control">
            <div class="form-control btn btn-success" id="slide"><h2 class = "fas fa-sliders"> Тест - вариант кошуу </h2> </div>
            <hr>
            <a class="btn btn-warning"><label for="rkg">Кыргызча вариант</label> <input type="radio" checked value="kg" name="var" id="rkg"></a> 
            <a class="btn btn-warning"><label for="rru">Русский вариант</label> <input type="radio" value="ru" name="var" id="rru"></a> <br>
            <br><p class=""><button class=" btn btn-outline-warning" type="submit" name = "vars"> <i class="fas fa-plus"> Кошуу</i> </button> </p>           
            <?php
                if (isset($_POST["vars"])) {
                    // var_dump($_POST["var"]);
                    $type = $_GET["type"].''.$_POST["var"];
                    $r = $conn -> query("SELECT * FROM kursTest");
                    $n = mysqli_num_rows($r);
                    $ids = 0;
                    if ($n) {
                        $row = mysqli_fetch_array($r);
                        do {
                            $ids = $row["id"];
                        } while ($row = mysqli_fetch_array($r));
                    }
                    $var = array(
                        'matem1kg' => 'Математика биринчи болук',
                        'matem1ru' => 'Математика первый часть',
                        'matem2kg' => 'Математика экинчи болук',
                        'matem2ru' => 'Математика второй часть',
                        'kyrgyzanalogiakg' => 'Окшоштуктар жана сүйлөмдөрдү толуктоо',
                        'kyrgyzanalogiaru' => 'Окшоштуктар жана сүйлөмдөрдү толуктоо',
                        'kyrgyzokuukg' => 'Окуу жана түшүнүү',
                        'kyrgyzokuuru' => 'Окуу жана түшүнүү',
                        'kyrgyzpracticakg' => 'Кыргыз тилинин практикалык грамматикасы',
                        'kyrgyzpracticaru' => 'Кыргыз тилинин практикалык грамматикасы'
                );
                $name = $var[$type];
                $conn -> query ("INSERT INTO kursTestVar(ids,type,name) VALUES('$ids','$type','$name')");
                $reload = './jrtvar.php?type='.$_GET["type"];
                header("Location: $reload");
                }
            ?>
            <hr>
        </form> 
        <form action="" method="post" class="form-control" enctype="multipart/form-data">
            <table class="table table-striped">
                <div class="form-control btn btn-success" id="slide"><h2 class = "fas fa-sliders"> Кыргызча варинттар</h2> </div>
                <?php
                    $type = $_GET["type"].'kg';
                    $r = $conn -> query("SELECT * FROM kursTestVar WHERE type = '$type'");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        echo '
                        <tr>
                            <th class="text-center">№</th>
                            <th class="text-center">Аталышы</th>
                            <th class="text-center">Кошуу</th>
                            <th class="text-center">Удалить</th>
                        </r>
                        ';
                        $row = mysqli_fetch_array($r);
                        do {
                            echo '
                                <tr>
                                    <td>'.$n--.'</td>
                                    <td>'.$row["name"].'</td>
                                    <td class="text-center"><a href = "./jrtimg.php?id='.$row["id"].'&type='.$row["type"].'"><button type="button" class=" btn-success" style="padding:5px 10px; font-size:25px"><i class="fas fa-plus"></i></button></a></td>
                                    <td class="text-center"><button type="button" class=" btn-danger" style="padding:5px 10px; font-size:25px" onclick = "deletes('.$row["id"].')">&times;</button></td>
                                </tr>
                            ';
                        } while($row = mysqli_fetch_array($r));
                    }
                ?>
            </table>
            <hr>
            <table class="table table-striped">
                  <div class="form-control btn btn-success" id="slide"><h2 class = "fas fa-sliders"> Русский варинтты</h2> </div>
                <?php
                    $type = $_GET["type"].'ru';
                    $r = $conn -> query("SELECT * FROM kursTestVar WHERE type = '$type'");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        echo '
                        <tr>
                            <th class="text-center">№</th>
                            <th class="text-center">Аталышы</th>
                            <th class="text-center">Кошуу</th>
                            <th class="text-center">Удалить</th>
                        </r>
                        ';
                        $row = mysqli_fetch_array($r);
                        do {
                            echo '
                                <tr>
                                    <td>'.$n--.'</td>
                                    <td>'.$row["name"].'</td>
                                    <td class="text-center"><a href = "./jrtimg.php?id='.$row["id"].'&type='.$row["type"].'"><button type="button" class=" btn-success" style="padding:5px 10px; font-size:25px"><i class="fas fa-plus"></i></button></a></td>
                                    <td class="text-center"><button type="button" class=" btn-danger" style="padding:5px 10px; font-size:25px" onclick = "deletes('.$row["id"].')">&times;</button></td>
                                </tr>
                            ';
                        } while($row = mysqli_fetch_array($r));
                    }
                ?>
            </table>
        </form>
        <hr>
    </div>
    <?php include("./php/save.php");?>
	<script src="../js/jquery.js"></script>
    <script src="./js/menu.js"></script>
    <script>
        document.querySelector(".jrt").style.borderBottom = "2px solid green";
      function deletes (x) {
        let y = 4;
            $.ajax({
                url:'./php/delete.php',
                type:'POST',
                cache:false,
                data:{x,y},
                dataType:'html',
                success: function (data) {
                  window.location.replace("");
                }
            });
      }
    </script>
</body>
</html>