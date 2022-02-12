<?php
    session_start();
    if ($_SESSION["log"] != 'Admin' || $_SESSION["pass"] != "Admin20210928") {
        header('Location:./register.php');
    }
    $id = $_GET["id"];
    $type = $_GET["type"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cабак кошуу</title>
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
    <?php
    $r = $conn -> query("SELECT * FROM kursThemeLessons WHERE id = '$id'");
    $n = mysqli_num_rows($r);
    $theme = '';
    if ($n) {
        $row = mysqli_fetch_array($r);
        do {
            $theme = $row['aty'];
        }while($row = mysqli_fetch_array($r));
    }
    ?>
    <div class="container homeContainer">
        <form action="" method="post" class="form-control" enctype="multipart/form-data">
            <div class="form-control btn btn-success" id="slide"><h2 class = "fas fa-sliders"><?php echo $theme;?>: сабак кошуу</h2> </div>
            <div class="p-5 text-center">
                <input type="text" name="theme" id="theme" class="form-control" placeholder = "Сабакка тема ..." required>
                <br>
                <input type="text" name="test" id="test" class="form-control" placeholder = "Сабак учун тестин ссылкасы ...">
                 <br>
                 <div style="display:flex">
                    <label for="doc"><i style= "cursor:pointer;" class="fas fa-files-o btn btn-warning" aria-hidden="true"> Тапшырма учун докумет же файл </i></label>
                    <input type="file" name="doc" id="doc" class="form-control" style="display:block;">
                 </div>
                 <br>
                 <div style="display:flex;">
                    <label for="video"><i style= "cursor:pointer" class="fas fa-video btn btn-warning" aria-hidden="true"> Видео сабак </i> </label>
                    <input type="text" name="video" id="video" class="form-control" style="display:block;" placeholder="Видео ссылка">
                 </div>
                <br><p class=""><button type="submit" name="submit4" class=" btn btn-outline-success"> <i class="fas fa-hdd-o"> Сохранить</i> </button> </p>           
            </div>
            <hr>
            <table class="table table-striped">
                <div class="form-control btn btn-success" id="slide"><h2 class = "fas fa-sliders"> Сабактар</h2> </div>
                <?php
                    $r = $conn -> query("SELECT * FROM kursVideo WHERE ids = '$id'  ORDER BY id DESC");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        echo '
                        <tr>
                            <th class="text-center">№</th>
                            <th class="text-center">Тема.</th>
                            <th class="text-center">Видео</th>
                            <th class="text-center">Тест</th>
                            <th class="text-center">Документ</th>
                            <th class="text-center">Изменить</th>
                            <th class="text-center">Удалить</th>
                        </r>
                        ';
                        $row = mysqli_fetch_array($r);
                        do {
                            echo '
                                <tr>
                                    <td>'.$n--.'</td>
                                    <td>'.$row["theme"].'</td>
                                    <td class="text-center"><h3 style="color:green" class= "fas fa-'.($row["video"]==''?"minus-circle":"plus-circle").'"></h3></td>
                                    <td class="text-center"><h3 style="color:green" class= "fas fa-'.($row["test"]==''?"minus-circle":"plus-circle").'"></h3></td>
                                    <td class="text-center"><h3 style="color:green" class= "fas fa-'.($row["file"]==''?"minus-circle":"plus-circle").'"></h3></td>
                                    <td class="text-center"><a href = "./php/kurs.php?id='.$row["id"].'&ids='.$id.'&type='.$type.'"><button type="button" class=" btn-success" style="padding:5px 10px; font-size:25px"><i class="fas fa-pen"></i></button></a></td>
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
        document.querySelector(".kurs").style.borderBottom = "2px solid green";
      function update1() {
        let theme = document.getElementById("theme").value;
        let text = document.getElementById("text").value;
        let you = document.getElementById("you").value;
        let submit4 = 1;
            $.ajax({
                url:'./php/updates.php',
                type:'POST',
                cache:false,
                data:{theme,text,you,submit4},
                dataType:'html',
                success: function (data) {
                    alert(data)
                //   window.location.replace("./math.php");
                }
            });
      }
      function deletes (x) {
        let y = 2;
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