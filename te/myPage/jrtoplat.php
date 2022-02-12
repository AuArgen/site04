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
            <div class="form-control btn btn-success" id="slide"><h2 class = "fas fa-check"> Жалпы республикалык тестке катто </h2> </div>
            <?php
            $type = 2;
            $buy;
            $testid = 0;
                    $r = $conn -> query("SELECT * FROM kursTest");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        $row = mysqli_fetch_array($r);
                        do {
                            $buy = $row["buy"];
                            $testid = $row["id"];
                        } while($row = mysqli_fetch_array($r));
                    }
            ?>
            <hr>
            <input type="search" class="form-control" name="" id="search" placeholder="ID CODE жазыныз..">
            <table class="result table table-striped"></table>
        </form> 
        <table class="table table-dark">
                <div class="form-control btn btn-success" id="slide"><h2 class = "fas fa-check"> Тестке катталгандар</h2> </div>
                <?php
                    $r = $conn -> query("SELECT * FROM kursELP WHERE testID = '$testid' and hod != 0 and hod != ''");
    $n = mysqli_num_rows($r);
    if ($n) {
        echo '
        <tr>
            <th class="text-center">№</th>
            <th class="text-center">ID CODE</th>
            <th class="text-center">Аты жону</th>
            <th class="text-center">Мекемеси</th>
            <th class="text-center">Шанс</th>
        </r>
        ';
        $row = mysqli_fetch_array($r);
        do {
            echo '
                <tr>
                    <td>'.$n--.'</td>
                    <td>'.$row["id"].'</td>
                    <td class="text-left">'.$row["fname"].' '.$row["sname"].'</td>
                    <td class="text-center">'.$row["org"].'</td>
                    <td class="text-center">'.$row["hod"].'</td>
                </tr>
            ';
        } while($row = mysqli_fetch_array($r));
    }
                ?>
            </table>
<?php
    if ($buy == 0) {
         header('Location:./jrt.php');
    }
?>
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
      document.querySelector("#search").oninput = () => {
        //   alert(12)
          let id = document.querySelector("#search").value
            $.ajax({
                        url:'./php/search.php',
                        type:'POST',
                        cache:false,
                        data:{id},
                        dataType:'html',
                        success: function (data) {
                            document.querySelector(".result").innerHTML = data
                        }
                    });
            }
      function saktoo(){
        //   alert(12)
          let hod = document.querySelector(".hodinput").value
          let id = document.querySelector(".ids").textContent
          let submit4 = 246;
        //   alert(hod)
            $.ajax({
                        url:'./php/updates.php',
                        type:'POST',
                        cache:false,
                        data:{id,hod,submit4},
                        dataType:'html',
                        success: function (data) {
                            // alert(data)
                            window.location.replace("");
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