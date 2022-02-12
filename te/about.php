<?php
  ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Биз</title>
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
            <div class="row" style="margin-top:40px; background:black; color:white;padding: 20px 20px" ><b style="color:orange"><a href="./">Башкы бет/</a> Биз</b></div>
        </div>
    </section>
<section  style="background:url(./img/bg.png) no-repeat; background-size:cover">
    <br>
	  <div class = "readBlock">
          <?php
			$r = $conn->query("SELECT * FROM kursWe");
			$n = mysqli_num_rows($r);
			if ($n) {
				$row = mysqli_fetch_array($r);
				do {
					echo'
                    <div class="container">
                            <div class="row">
                                <div class="image colsol" data-aos="zoom-in" data-aos-delay="300">
                                    <img src="'.$row["image"].'" style="width:100%; height:300px">
                                </div>
                                <div class="colsol" data-aos="zoom-in" data-aos-delay="300">
                                    <h2 style="text-align:center; text-decoration:underline">'.$row["aty"].'</h2>
                                    <h3><p style="color:rgba(5,115,5,0.9)">'.$row["text"].'</p></h3>
                                </div>
                            </div>
                    </div>
                    <div class="container" data-aos="zoom-in" data-aos-delay="200">
                        <div class="row">
                            <div class="row"><h2 style="color:orange" class="fas fa-comments"> Байланышуу булактары:</h2></div>
                        </div>
                        <div class="row"><a href="tel:'.$row["tel"].'" style="border-bottom:1px solid gray" class="fas fa-mobile-alt" aria-hidden="true"> '.$row["tel"].'</a></div>
                        <div class="row"><b style="border-bottom:1px solid gray"><a href="https://api.whatsapp.com/send?phone='.$row["whatsapp"].'" class="fab fa-whatsapp" aria-hidden="true" style="color:green"> <a href="https://api.whatsapp.com/send?phone='.$row["whatsapp"].'"><strong> '.$row["whatsapp"].'</strong></a></a></b></div>
                        <div class="row"><b style="border-bottom:1px solid gray"><a href="mailto:'.$row["email"].'" class="fas fa-envelope" style="color:red"> <a> '.$row["email"].'</a></a></b></div>
                    </div>
                    <hr>					
					';
				} while($row = mysqli_fetch_array($r));
			}
		?>
        </div>
        <br>
        <br>
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


