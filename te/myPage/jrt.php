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
    <title>ЖРТ тест</title>
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
            <div class="form-control btn btn-success" id="slide"><h2 class = "fas fa-check"> Жалпы республикалык тест </h2> </div>
            <?php
            $type = 2;
            $buy;
                    $r = $conn -> query("SELECT * FROM kursTest");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        $row = mysqli_fetch_array($r);
                        do {
                            $buy = $row["buy"];
                        echo '
                            <div class="p-5 text-center">
                                <input type="text" name="theme" id="theme" class="form-control" placeholder = "Название тест. ..." value="'.$row["theme"].'" required>
                                <br>
                                <input type="datetime-local" name="theme" id="datetime" class="form-control" placeholder = "Дата тест. ..." value="'.$row["datatime"].'" required>
                                <br>
                                <p style="text-align:left; width:500px;"><input type="radio" value="0" name = "tunkun" id = "kun"> <label for="kun" class="fa fa-clock"> Кундузгу саат '.($row["kuntun"] == 1?"<i class = 'fa fa-check'></i>":"").'</label></p>
                                <br>
                                <p style="text-align:left; width:500px;"><input type="radio" value="0" name = "buy" id = "buy"> <label for="buy" class="fa fa-clock"> Акчалуу '.($row["buy"] == 1?"<i class = 'fa fa-check'></i>":"").'</label></p>
                                <br>
                                <br><p class=""><button type = "button" class=" btn btn-outline-warning" onclick = "update1()"> <i class="fas fa-hdd-o"> Сохранить</i> </button> </p>           
                            </div>                     
                            ';
                        } while($row = mysqli_fetch_array($r));
                    }
            ?>
            <hr>
        </form> 
<?php
    if ($buy == 1) {
        echo '
        <form class="form-control">
            <a href="jrtoplat.php" class="btn btn-primary p-2 block">Теске каттоо</a>
        </form>
        ';
    }
?>
            <form action="" class="form-control">
                <a href="jrtvar.php?type=matem1" class="btn btn-success" style = "margin-top:15px">Математика биринчи болук</a>
                <a href="jrtvar.php?type=matem2" class="btn btn-success" style = "margin-top:15px">Математика экинчи болук</a>
                <a href="jrtvar.php?type=kyrgyzanalogia" class="btn btn-success" style = "margin-top:15px">Окшоштуктар жана сүйлөмдөрдү толуктоо</a>
                <a href="jrtvar.php?type=kyrgyzokuu" class="btn btn-success" style = "margin-top:15px">Окуу жана түшүнүү </a>
                <a href="jrtvar.php?type=kyrgyzpractica" class="btn btn-success" style = "margin-top:15px"> Кыргыз тилинин практикалык грамматикасы</a>
                <br><br>
            </form>
        <hr>
    </div>
    <?php include("./php/save.php");?>
	<script src="../js/jquery.js"></script>
    <script src="./js/menu.js"></script>
    <script>
        document.querySelector(".jrt").style.borderBottom = "2px solid green";
      function update1() {
        let theme = document.getElementById("theme").value;
        let datetime = document.getElementById("datetime").value;
        let w = 0,b = 0
        if (document.querySelector("#kun").checked) {
            w = 1
        }
        if (document.querySelector("#buy").checked) {
            b = 1
        }
        let submit4 = 245;
            $.ajax({
                url:'./php/updates.php',
                type:'POST',
                cache:false,
                data:{theme,datetime,submit4,w,b},
                dataType:'html',
                success: function (data) {
                    // if (date == "")alert(data)
                  window.location.replace("./jrt.php");
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