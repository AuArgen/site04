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
    <title>Admin</title>
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
        <form action="" method="post" class="form-control" enctype="multipart/form-data">
            <div><a href="#slide"><button class=" btn-primary" type="button">Слайд</button></a>
            <a href="#content"><button class=" btn-primary" type="button">Контент</button></a> </div><br>
            <div class="form-control btn btn-success" id="slide"><h2 class = "fas fa-sliders"> Слайд</h2> </div>
            <div class="p-5 text-center">
                <input type="text" name="theme" id="theme" class="form-control" placeholder = "Введите тема..." required>
                <br>
                <textarea name="text" id="text" cols="30" rows="5" maxLength="400" class="form-control" placeholder = "Введите текст..." required></textarea>
                <br>
                <label for="image1"><i style= "cursor:pointer" class="fas fa-picture-o btn btn-warning" aria-hidden="true"> Выберте картинка </i>  </label> <div id="h1"></div>
                <input type="file" name="image" id="image1" class="form-control" style="display:none;" onchange = "getImagePreview(1)" required>
                <br><p class=""><button type="submit" name="submit" class=" btn btn-outline-success"> <i class="fas fa-hdd-o"> Сохранить</i> </button> </p>           
            </div>
            <hr>
            <table class="table">
                <?php
                    $r = $conn -> query("SELECT * FROM kursHome WHERE type = '1' ORDER BY id DESC");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        echo '
                        <tr>
                            <th class="text-center">№</th>
                            <th class="text-center">Тема</th>
                            <th class="text-center">Изброжение</th>
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
                                    <td class="text-center"> <img src=".'.$row["image"].'" alt="T" width="80"></td>
                                    <td class="text-center"><a href = "./php/index.php?id='.$row["id"].'&type='.$row["type"].'"><button type="button" class=" btn-success" style="padding:5px 10px; font-size:25px"><i class="fas fa-pen"></i></button></a></td>
                                    <td class="text-center"><button type="button" class=" btn-danger" style="padding:5px 10px; font-size:25px" onclick = "deletes('.$row["id"].')">&times;<input type="hidden" id="i'.$row["id"].'" value="'.$row["image"].'"></button></td>
                                </tr>
                            ';
                        } while($row = mysqli_fetch_array($r));
                    }
                ?>
            </table>
        </form> 
        <hr>
        <form action="" method="post" class="form-control" enctype="multipart/form-data">
            <div class="form-control btn btn-success" id="content"><h2 class = "fas fa-sliders"> Контенты</h2> </div>
            <div class="p-5 text-center">
                <input type="text" name="theme" id="theme" class="form-control" placeholder = "Введите тема..." required>
                <br>
                <textarea name="text" id="text" cols="30" rows="5" class="form-control" placeholder = "Введите текст..." required></textarea>
                <br>
                <label for="image2"><i style= "cursor:pointer" class="fas fa-picture-o btn btn-warning" aria-hidden="true"> Выберте картинка </i>  </label> <div id="h2"></div>
                <input type="file" name="image" id="image2" class="form-control" style="display:none;" onchange = "getImagePreview(2)" required>
                <br><p class=""><button type="submit" name="submit2" class=" btn btn-outline-success"> <i class="fas fa-hdd-o"> Сохранить</i> </button> </p>           
            </div>
            <hr>
            <table class="table">
                <?php
                    $r = $conn -> query("SELECT * FROM kursHome WHERE type = '2' ORDER BY id DESC");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        echo '
                        <tr>
                            <th class="text-center">№</th>
                            <th class="text-center">Тема</th>
                            <th class="text-center">Изброжение</th>
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
                                    <td class="text-center"> <img src=".'.$row["image"].'" alt="T" width="80"></td>
                                    <td class="text-center"><a href = "./php/index.php?id='.$row["id"].'&type='.$row["type"].'"><button type="button" class=" btn-success" style="padding:5px 10px; font-size:25px"><i class="fas fa-pen"></i></button></a></td>
                                    <td class="text-center"><button type="button" class=" btn-danger" style="padding:5px 10px; font-size:25px" onclick = "deletes('.$row["id"].')">&times;<input type="hidden" id="i'.$row["id"].'" value="'.$row["image"].'"></button></td>
                                </tr>
                            ';
                        } while($row = mysqli_fetch_array($r));
                    }
                ?>
            </table>
            <a href="#slide"><button class=" btn-primary" type="button">Слайд</button></a>
            <a href="#content"><button class=" btn-primary" type="button">Контент</button></a>
        </form>
    </div>
    <?php include("./php/save.php");?>
	<script src="../js/jquery.js"></script>
    <script src="./js/menu.js"></script>
        
    <script>
        document.querySelector(".bashky").style.borderBottom = "2px solid green";
        function getImagePreview(u)
      {
        var image=URL.createObjectURL(event.target.files[0]);
        var imagediv= document.querySelector(`#h${u}`);
        var newimg=document.createElement('img');
        let x = new FormData();
        x.append("file",document.getElementById(`image${u}`).files[0]);
        console.log(x);
        imagediv.innerHTML='';
        newimg.src=image;
        newimg.width="300";
        imagediv.appendChild(newimg);
      }
      function deletes (x) {
        let y = 0;
        let z = document.getElementById(`i${x}`).value;
            $.ajax({
                url:'./php/delete.php',
                type:'POST',
                cache:false,
                data:{x,y,z},
                dataType:'html',
                success: function (data) {
                  window.location.replace("./");
                }
            });
      }
    </script>
</body>
</html>