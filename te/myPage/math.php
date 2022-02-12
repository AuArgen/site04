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
    <title>Математика</title>
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
            <div class="form-control btn btn-success" id="slide"><h2 class = "fas fa-sliders"> Математика -> маалымат кошуу </h2> </div>
            <?php
            $type = 1;
                    $r = $conn -> query("SELECT * FROM kursKursy WHERE type='$type'");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        $row = mysqli_fetch_array($r);
                        do {
                        echo '
                            <div class="p-5 text-center">
                                <input type="text" name="theme" id="theme" class="form-control" placeholder = "Название курс. ..." value="'.$row["theme"].'" required>
                                <br>
                                <textarea name="text" id="text" cols="30" rows="5" class="form-control" placeholder = "Про курса..." required>'.$row["text"].'</textarea>
                                <br>
                                <input type="text" name="youtube" id="you" class="form-control" placeholder = "YouTube видео вствате ссылка видео ..." value="'.$row["video"].'" required>
                                <input type="file" style="display:none" name="image">
                                <br><p class=""><button class=" btn btn-outline-warning" onclick = "update1()"> <i class="fas fa-hdd-o"> Сохранить</i> </button> </p>           
                            </div>                     
                            ';
                        } while($row = mysqli_fetch_array($r));
                    }
                $Lessons = array();
                $r = $conn -> query("SELECT * FROM kursThemeLessons WHERE type = '$type'");
                $n = mysqli_num_rows($r);
                $theme = '';
                if ($n) {
                    $row = mysqli_fetch_array($r);
                    do {
                        $Lessons[] = $row['id'];
                    }while($row = mysqli_fetch_array($r));
                }
                $KolLessons = array();
                for ($i = 0; $i < count($Lessons); $i++) {
                    $ids = $Lessons[$i];
                    $r = $conn -> query("SELECT * FROM kursVideo WHERE type = '$type' AND ids = '$ids'");
                    $KolLessons[] = mysqli_num_rows($r);
                }
            ?>
            <hr>
        </form> 
        <form action="" method="post" class="form-control" enctype="multipart/form-data">
            <div class="form-control btn btn-success" id="slide"><h2 class = "fas fa-sliders"> Тема кошуу</h2> </div>
            <div class="p-5 text-center">
                <input type="text" name="theme" id="theme" class="form-control" placeholder = "Теманын аталышы..." required>
                <br>
                <br><p class=""><button type="submit" name="submit6" class=" btn btn-outline-success"> <i class="fas fa-hdd-o"> Сохранить</i> </button> </p>           
            </div>
            <hr>
            <table class="table table-striped">
                <div class="form-control btn btn-success" id="slide"><h2 class = "fas fa-sliders"> Сабактын темалары</h2> </div>
                <?php
                    $r = $conn -> query("SELECT * FROM kursThemeLessons WHERE type = '$type' ORDER BY id DESC");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        echo '
                        <tr>
                            <th class="text-center">№</th>
                            <th class="text-center">Тема.</th>
                            <th class="text-center">Cабактардын саны</th>
                            <th class="text-center">Кошуу</th>
                            <th class="text-center">Жанылоо</th>
                            <th class="text-center">Удалить</th>
                        </r>
                        ';
                        $row = mysqli_fetch_array($r);
                        do {
                            echo '
                                <tr>
                                    <td>'.$n--.'</td>
                                    <td>'.$row["aty"].'</td>
                                    <td class="text-center"><h3 style="color:green">'.$KolLessons[$n].'</h3></td>
                                    <td class="text-center"><a href = "./lessons.php?id='.$row["id"].'&type='.$row["type"].'"><button type="button" class=" btn-success" style="padding:5px 10px; font-size:25px"><i class="fas fa-plus"></i></button></a></td>
                                    <td class="text-center"><a href = "./php/theme.php?id='.$row["id"].'&type='.$type.'"><button type="button" class=" btn-success" style="padding:5px 10px; font-size:25px"><i class="fas fa-pen"></i></button></a></td>
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
        let submit4 = '<?php echo $type;?>';
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
        let y = 3;
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