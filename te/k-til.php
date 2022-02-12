<?php
  ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кыргыз-тили</title>
	<link rel="stylesheet" href="./css/owl.carousel.min.css">
<link rel="stylesheet" href="./css/owl.theme.default.min.css">
<link rel="stylesheet" href="./css/all.css">
<link rel="stylesheet" href="./css/fonts.css">
<link rel="stylesheet" href="./css/font-awesome.css">
<link rel="stylesheet" href="./css/fontawesome.min.css">
<!-- ------------ AOS Library ------------------------- -->
<link rel="stylesheet" href="./css/aos.css">
<link rel="stylesheet" href="./css/cssfile.css">
<!-- Custom Style   -->
<link rel="stylesheet" href="./css/Style.css">
<link rel="stylesheet" href="./css/style2.css">
<link rel="stylesheet" href="./css/x.css">
	<link rel="stylesheet" href="./css/xx.css">
	
</head>
<body>
	<?php
	 include("menu.php");
   include("./myPage/php/connect.php");
	 ?>
	<br>
    <section>
        <div class="">
            <div class="row" style="margin-top:40px; background:black; color:white;padding: 20px 20px" ><b style="color:orange"><a href="./">Башкы бет/</a>Кыргыз-тили</b></div>
        </div>
    </section>
<section>
    <br>
	<section class="container">
        <div class="blockDiv">
            <?php
            $type = 2;
            $r = $conn->query("SELECT * FROM kursVideo WHERE type = '$type'");
            $kol = mysqli_num_rows($r);
            $r = $conn->query("SELECT * FROM kursThemeLessons WHERE type = '$type'");
            $kolT = mysqli_num_rows($r);
            $theme = array();
            if ($kolT) {
                $row = mysqli_fetch_array($r);
                do {
                    $theme[] = $row["id"];
                } while($row = mysqli_fetch_array($r));
            }
            $doc = array();
            $test = array();
            $youtube = array();
            for ($i = 0; $i < count($theme); $i++) {
                $ids = $theme[$i];
                $r2 = $conn->query("SELECT * FROM kursVideo WHERE ids = '$ids' AND file !=''");
                $doc[] = mysqli_num_rows($r2);
                $r2 = $conn->query("SELECT * FROM kursVideo WHERE ids = '$ids' AND test !=''");
                $test[] = mysqli_num_rows($r2);
                $r2 = $conn->query("SELECT * FROM kursVideo WHERE ids = '$ids' AND youTube != '' ");
                $youtube[] = mysqli_num_rows($r2);
            }
            $r2 = $conn->query("SELECT * FROM kursKursy WHERE type = '$type'");
            if (mysqli_num_rows($r2)) {
              $row = mysqli_fetch_array($r2);
              do {
                echo '
                <h1><b>'.$row["theme"].'</b></h1>
                <p><span>'.$row["text"].'</span></p>
                  <br>
                    <p style="text-align:center;"><iframe  src="'.$row["video"].'" frameborder="0" allowfullscreen width="600" height="400"></iframe></p>
                  <br>
                  <hr>      
                  <br>      
                  <br>  
                ';
              } while($row = mysqli_fetch_array($r2));
            }
          ?>            <table id="table">
                <tr>
                    <td>Билиш керек:</td>
                    <td>Жазуу жана окууну билуу</td>
                </tr>
                <tr>
                    <td>Темалардын саны:</td>
                    <td><?php echo $kolT;?></td>
                </tr>
                <tr>
                    <td>Видео сабактардын саны:</td>
                    <td><?php echo $kol;?></td>
                </tr>
                <tr>
                    <td>Чектоолор убакыты:</td>
                    <td>Жок</td>
                </tr>
                <tr>
                    <td>Чаттарда байланушуу:</td>
                    <td>Болот</td>
                </tr>
                <tr>
                    <td>Тестер жана тапшырмалар:</td>
                    <td>Берилет</td>
                </tr>
                <tr>
                    <td>Тестер жана тапшырмаларды текшеруу:</td>
                    <td>Болот</td>
                </tr>
            </table>
        </div>
    </section>  
    <br>
    <section>
        <div class="container">
  <table id="customers">
   <?php
   $r = $conn->query("SELECT * FROM kursThemeLessons WHERE type = '$type'");
     if (mysqli_num_rows($r)) {
              $row = mysqli_fetch_array($r);
              echo'
                <tr>
                  <th>№</th>
                  <th>Тема</th>
                  <th>Юутаб</th>
                  <th>Тест</th>
                  <th>Тапшырма</th>
                </tr>
              ';
              $count = 1;
              do {
                echo '
                  <tr>
                    <td><a href="vide.php?id='.$row["id"].'&type='.$row["type"].'">'.$count++.'</a></td>
                    <td><a href="vide.php?id='.$row["id"].'&type='.$row["type"].'" class="fa fa-link"> '.$row["aty"].'</a></td>
                    <td class="text-center"><a href="vide.php?id='.$row["id"].'&type='.$row["type"].'"><h3 style="color:green" class= "fas fa-'.($youtube[$count-2]==0?"minus-circle":"plus-circle").'"></h3></a></td>
                    <td class="text-center"><a href="vide.php?id='.$row["id"].'&type='.$row["type"].'"><h3 style="color:green" class= "fas fa-'.($test[$count-2]==0?"minus-circle":"plus-circle").'"></h3></a></td>
                    <td class="text-center"><a href="vide.php?id='.$row["id"].'&type='.$row["type"].'"><h3 style="color:green" class= "fas fa-'.($doc[$count-2]==0?"minus-circle":"plus-circle").'"></h3></a></td>
                  </tr>
                ';
              } while($row = mysqli_fetch_array($r));
            }
    ?>
</table>
        </div>
    </section>
</section>
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
</body>
</html>


