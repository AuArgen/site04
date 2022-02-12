<?php
  ob_start();
?>
<?php
     $id = $_GET["id"];
	$typ = $_GET["type"];
	$video = $_GET["video"];
    //  var_dump($id);
     $ids = '';
     $ids = $ids."".$id;
     $ni = 0;
     for ($i = 0; $i < strlen($ids); $i++) {
        $yes = 0; 
        for ($j = 0; $j < 10; $j++) {
             if($ids[$i] == ''.$j) $yes++;
        }
        if ($yes == 0) {
            $ni = 44;
            echo '        <script>
                        function Load() {
                            window.location.replace("./");
                        }
                        setTimeout(Load,10);
                    </script>';
                    break;
        }
     }
    $typ = $_GET["type"];
    //  var_dump($id);
     $ids = '';
     $ids = $ids."".$typ;
     $nin = 0;
     for ($i = 0; $i < strlen($ids); $i++) {
        $yes = 0; 
        for ($j = 0; $j < 10; $j++) {
             if($ids[$i] == ''.$j) $yes++;
        }
        if ($yes == 0) {
            $nin = 44;
            echo '        <script>
                        function Load() {
                            window.location.replace("./");
                        }
                        setTimeout(Load,0);
                    </script>';
                    break;
        }
     }
    session_start();
    include("./myPage/php/connect.php");
    $log = $_SESSION["log"];
    $pass = $_SESSION["pass"];
    $r = $conn -> query("SELECT * FROM kursELP WHERE login = '$log' and password = '$pass'");
   	if (!mysqli_num_rows($r)) {
        if ($typ == 1)header("Location:./register.php?id=$id&type=$typ&video=$video");
        else if($typ == 2)  header("Location:./register.php?id=$id&type=$typ&video=$video");
        else header("Location:./register.php?id=$id&type=$typ&video=$video");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сабак</title>
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
</head>
<body>
	<?php
	 include("menu.php");
     ?>
	<br>
    <section id="plays">
        <div class="">
            <div class="row" style="margin-top:40px; background:black; color:white;padding: 20px 20px" ><b style="color:orange"><a href="./">Башкы бет/</a><?php if ($_GET["type"] == 1) echo '<a href="./math.php"> Математика/</a>'; else if ($_GET["type"] == 2)  echo '<a href="./k-til.php"> Кыргыз-тили/</a>'; else echo '<a href="./sat.php"> SAT/</a>';  ?>Видео жана сабактар </b></div>
        </div>
    </section>
<section class="container">
    <br>
    <div class="play">
	
		  <?php
    include("./myPage/php/connect.php");
    if ($_GET["video"])
    $video = $_GET["video"];
		if ($video) {
            $r2 = $conn->query("SELECT * FROM kursVideo WHERE id = '$video'");
            if (mysqli_num_rows($r2)) {
              $row = mysqli_fetch_array($r2);
              do {
                  $tap = '';
                  $test = '';
                  if ($row["file"] != '') $tap = '<a href="'.$row["file"].'"class="btn fas fa-pen"> Тапшырма</a>';
                  if ($row["test"] != '') $test = '<form action="test.php" method="post">
                    <input type="hidden" value="'.$row["test"].'" name="test">
                    <input type="hidden" value="'.$row["ids"].'" name="type">
                    <input type="submit" value="" style="opacity:0;" id="submit"><label for="submit" class="btn fas fa-check"> Тест</label></form>';
                echo '
                   <h1 style="text-align:center">Тема: '.$row["theme"].'</h1>
                   <hr>
                   <br>
                    <p style="text-align:center"><iframe  src="'.$row["video"].'" title="Nash kurs site" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen height="400" style="min-width:60%; max-width:95%;"></iframe></p>
                    <br>
					<div class="btns">
                    '.$tap.'
                    '.$test.'
					</div>
                    <br>
                    <br>
                    <hr>
                ';
              } while($row = mysqli_fetch_array($r2));
            }
		}
    ?>
	
	</div>
<div class="videos">
<?php
if ($ni == 0) {
            $r2 = $conn->query("SELECT * FROM kursVideo WHERE ids = '$id'");
            if (mysqli_num_rows($r2)) {
              $row = mysqli_fetch_array($r2);
              do {
                echo '
                <div class="video video'.$row["id"].'">
                    <div class="ifr">
                    <iframe  src="'.$row["video"].'" title="Nash kurs site" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" style="width:100%; height:220px"></iframe>
                    <h3 style="text-align:center; width:100%;">Тема: '.$row["theme"].'</h3>    
                    </div>
                    <a href="./vide.php?id='.$id.'&type='.$typ.'&video='.$row["id"].'"><div class="func"></div></a>
                </div>
                ';
              } while($row = mysqli_fetch_array($r2));
            }
        }
?>
</div>
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


