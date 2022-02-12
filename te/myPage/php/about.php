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
    <title>Биз жанылоо</title>
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
            <div class="form-control btn btn-success" id="slide"><h2 class = "fas fa-sliders"> Маалыматы жанылоо</h2> </div>
            <hr>
            <table class="table">
                <?php
                $id = $_GET["id"];
                    $r = $conn -> query("SELECT * FROM kursWe WHERE id = '$id'");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        $row = mysqli_fetch_array($r);
                        do {
                            echo '
                                <div class="p-5 text-center">
                                    <input type="text" name="theme" id="theme" class="form-control" placeholder = "Введите Ф.И.О. ..." value="'.$row["aty"].'" required>
                                    <br>
                                    <textarea name="text" id="text" cols="30" rows="5" class="form-control" placeholder = "Введите о вас..." required>'.$row["text"].'</textarea>
                                    <br>
                                    <input type="text" name="tel" id="tel" class="form-control" placeholder = "Введите телефон номер. ..." value="'.$row["tel"].'" required>
                                    <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder = "Введите whatsapp номер. ..." value="'.$row["whatsapp"].'" required>
                                    <input type="text" name="email" id="email" class="form-control" placeholder = "Введите email ..." value="'.$row["email"].'" required>
                                    <br>
                                    <label for="image1"><i style= "cursor:pointer" class="fas fa-picture-o btn btn-warning" aria-hidden="true"> Изменить картинка </i>  </label> <div id="h1"><img src="../.'.$row["image"].'" alt="img" width="300"></div>
                                    <input type="file" name="image" id="image1" class="form-control" style="display:none;" onchange = "getImagePreview(1)">
                                    <input type="hidden" value="'.$row["image"].'" name = "h0">
                                    <br><p class=""><button type="submit" name="submit3" class=" btn btn-outline-success"> <i class="fas fa-hdd-o"> Сохранить</i> </button> </p>           
                                </div>
                            ';
                        } while($row = mysqli_fetch_array($r));
                    }
                ?>
            </table>
        </form> 
        <hr>
    </div>
    <?php include("./update.php");?>
	<script src="./js/jquery.js"></script>
    <script src="./js/menu.js"></script>
    <script>
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
        let y = 1;
        let z = document.getElementById(`i${x}`).value;
            $.ajax({
                url:'./php/delete.php',
                type:'POST',
                cache:false,
                data:{x,y,z},
                dataType:'html',
                success: function (data) {
                  window.location.replace("");
                }
            });
      }
    </script>
</body>
</html>