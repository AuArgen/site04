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
    <title>Изменить уроки</title>
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
    <style>
        img{
            max-width: 100%;
        }
    </style>
</head>
<body>
    <?php include("./menu.php"); include("./connect.php");?>
    <div class="container homeContainer">
        <form action="" method="post" class="form-control" enctype="multipart/form-data">
            <hr>
            <table class="table">
                <?php
                    $id = $_GET["id"];
                    $typ = $_GET["type"];
                    $ids = $_GET["ids"];
                    $i = 0;
                    $r = $conn -> query("SELECT * FROM kursTestImg WHERE id = '$id'");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        $row = mysqli_fetch_array($r);
                        do {
                              $i = $row["ot"];                      
                        } while($row = mysqli_fetch_array($r));
                    }
                    $r = $conn -> query("SELECT * FROM kursTestAnswer WHERE ids = '$id'");
                    $n = mysqli_num_rows($r);
                    $text ="<h3>Тест жооптоор жана туура жоопко беруулучу балл</h3>";
                    if ($n) {
                        $row = mysqli_fetch_array($r);
                        do {
                            $text = $text.'<div class="row"><span class="col-2"><b> '.$i.' - Тест</b></span> <input class="col-3" maxlength=1  placeholder="'.$i.' - Жооп:" value = "'.$row["jop"].'" name = "jop'.$i.'" required><input class="col-3"  placeholder="'.$i.' - Балл:" value = "'.$row["bal"].'" name = "bal'.$i.'"><input type="hidden" name="id'.$i.'" value="'.$row["id"].'"></div>';
                            $i++;
                        } while($row = mysqli_fetch_array($r));
                    }
                    $r = $conn -> query("SELECT * FROM kursTestImg WHERE id = '$id'");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        $row = mysqli_fetch_array($r);
                        
                            echo '
                              <div class="form-control btn btn-success"><h2 class = "fas fa-check"> Тестти озорту</h2> </div>
                              ';
                        do {
                            echo '
                            <div class="p-5 text-center">
                                <input type="number" min=1 name="num1" id="num1" class="form-control" placeholder = "Канчанчы тестен баталшы (мисалы : 1)" value="'.$row["ot"].'" required>
                                <br>
                                <input type="number" min=1 name="num2" id="num2" class="form-control" placeholder = "Канчанчы тестен аякташы (мисалы : 10)" value="'.$row["do"].'" required>
                                <br>
                                <div style="display:flex">
                                    <label for="image"><i style= "cursor:pointer;" class="fas fa-image btn btn-warning" aria-hidden="true"> Тест учун картинка</i></label>
                                    <input type="file"  onchange = "getImagePreview(event,1)" name="image" id="image" class="form-control" style="display:block;">
                                    <input type="hidden" name="image2" id="image2" value="'.$row["image"].'" class="form-control" style="display:block;">
                                </div>
                                <div id = "1"><img src="../.'.$row["image"].'" ></div>
                                <br>
                                '.$text.'
                                <br><p class=""><button type="submit" name="submit7_2" class=" btn btn-outline-success"> <i class="fas fa-plus"> Сохранить</i> </button> </p>           
                                </div>
                            ';
                        } while($row = mysqli_fetch_array($r));
                    }
                    include("./save.php");
                ?>
            </table>
				<script src="./js/jquery.js"></script>
    <script src="./js/menu.js"></script>
			<script src="./qr/qrcode.js"></script>
<br />
			<br>
			<br>
<script type="text/javascript">
        document.querySelector(".jrt").style.borderBottom = "2px solid green";
                function getImagePreview(event,n)
            {
                var image=URL.createObjectURL(event.target.files[0]);
                var imagediv= document.getElementById(n+"");
                var newimg=document.createElement('img');
                imagediv.innerHTML='';
                newimg.src=image;
                imagediv.appendChild(newimg);
            }

</script>
        </form>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
    </div>
    <script>
    </script>
</body>
</html>