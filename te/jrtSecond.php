<?php
  ob_start();
?>
<?php
    session_start();
    $log = $_SESSION["log"];
    $pass = $_SESSION["pass"];
     include("./myPage/php/connect.php");
    $r = $conn -> query("SELECT * FROM kursELP WHERE login = '$log' and password = '$pass'");
    if (!mysqli_num_rows($r)) header("Location:./register.php?type=4");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестке катталуу</title>
	<link rel="stylesheet" href="./css/owl.carousel.min.css">
<link rel="stylesheet" href="./css/owl.theme.default.min.css">
<link rel="stylesheet" href="./css/all.css">
<link rel="stylesheet" href="./css/fonts.css">
<!-- ------------ AOS Library ------------------------- -->
<link rel="stylesheet" href="./css/aos.css">
<link rel="stylesheet" href="./css/cssfile.css">
<!-- Custom Style   -->
<link rel="stylesheet" href="./css/Style.css">
<link rel="stylesheet" href="./css/style2.css">
<link rel="stylesheet" href="./css/x.css">
	<link rel="stylesheet" href="./css/xx.css">
	<link rel="stylesheet" href="./css/xxx.css">
	<link rel="stylesheet" href="./css/jrt.css">
</head>
<body>
	<?php
	 include("menu.php");
     ?>
	<br>
    <section id="plays">
        <div class="">
            <div class="row" style="margin-top:40px; background:black; color:white;padding: 20px 20px" ><b style="color:orange"><a href="./">Башкы бет/</a><a href="./jrt.php">ЖРТ тест/</a>Тестке катталуу </b></div>
        </div>
    </section>
<section class="container">
    <br>
<?php
    $testid;
    $a = 0;
    $res = $conn -> query("SELECT * FROM kursTest");
    if (mysqli_num_rows($res)) {
        $row = mysqli_fetch_array($res);
        do {
            $testid = $row["id"];
            $a = $row["people"];
        } while ($row = mysqli_fetch_array($res));
    }
    $res = $conn -> query("SELECT * FROM kursELP WHERE login = '$log' and password = '$pass'");
    $a++;
    if (mysqli_num_rows($res)) {
        $row = mysqli_fetch_array($res);
        do {
            if ($row["sname"] != "" && $row["fname"] != "" && $row["geo"] != "" && $row["org"] != "") {
                if ($row["testID"] != $testid.'') {
                    $conn -> query("UPDATE kursTest SET people = '$a'");
                    if ($conn -> query("UPDATE kursELP SET testID = '$testid' WHERE login = '$log' and password = '$pass'"))
                        header('Location: ./oplata.php');
                } else header('Location: ./oplata.php');
            } else {
                echo '
                    <div class="container">
                        <form class="form-control" method="post">
                            <h1>Сиз озунуз тууралуу маалыматты тактап коюнуз!</h1>
                            <br>
                            <input type = "name" name = "fname" placeholder="Атыныз..." value = "'.$row["fname"].'" required><br>
                            <input type = "name" name = "sname" placeholder="Фамилияныз..." value = "'.$row["sname"].'" required><br>
                            <input type = "name" name = "geo" placeholder="Жашаган жериниз..." value = "'.$row["geo"].'" required><br>
                            <input type = "name" name = "org" placeholder="Билим алып жаткан мектеп же мекеме..." value = "'.$row["org"].'" required><br>
                            <input type = "submit" name = "save" class="btn" value = "Сактоо">
                        </form>
                    </div>
                ';
            }
        } while ($row = mysqli_fetch_array($res));
    }
    if (isset($_POST["save"])) {
        $sf = $_POST["fname"];
        $sn = $_POST["sname"];
        $geo = $_POST["geo"];
        $org = $_POST["org"];
        $conn -> query("UPDATE kursTest SET people = '$a'");
        $conn -> query("UPDATE kursELP SET testID = '$testid', sname = '$sn', fname = '$sf', geo = '$geo', org = '$org' WHERE login = '$log' and password = '$pass'");
        header('Location: ./oplata.php');
    }
?> 
</section>
<hr>
<?php
	include("./footer.php");
?>
<script src="./js/jsfile.js"></script>
    <!-- Jquery Library file -->
    <script src="./js/Jquery3.4.1.min.js"></script>

    <!-- --------- Owl-Carousel js ------------------->
    <script src="./js/owl.carousel.min.js"></script>

    <!-- ------------ AOS js Library  ------------------------- -->
    <script src="./js/aos.js"></script>

    <!-- Custom Javascript file -->
    <script src="./js/main.js"></script>
<script>
	            window.onkeydown = ()=> {
        return true;
    }
    window.oncontextmenu = () => {
        return false;
    }
    function videos(x) {
        if (document.querySelector(`.videoNot`))document.querySelector(`.videoNot`).classList.toggle("videoNot");
        document.querySelector(`.video${x}`).classList.toggle("videoNot");
            $.ajax({
                url:'./sawME.php',
                type:'POST',
                cache:false,
                data:{x},
                dataType:'html',
                success: function (data) {
                  document.querySelector(`.play`).innerHTML = data;
                }
            });
        window.location.replace("#plays");
    }
</script>
</body>
</html>


