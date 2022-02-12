<?php
	ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">
	<title>Башкы бет тест</title>
	<meta name="keywords" content="ОРТ, орт, Орт, Жрт, ЖРТ, жалпы, республикалык, тест, ошбий, общий,математика, кыргыз,тили, онлайн тест, тестиг, testing, test, ort, jrt,">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="Математика жана кыргыз тили боюнча видео сабактар жанам орт боюнча тест ошондой эле SAT боюнча сабактар.">
	<meta name="binary-transparency-manifest-key" content="2.2202.12">
	<meta name="og:description" content="Математика жана кыргыз тили боюнча видео сабактар жанам орт боюнча тест ошондой эле SAT боюнча сабактар.">
	<meta name="og:url" content="https://test.gda.com.kg/">
	<meta name="og:title" content="ОРТ ЖРТ">
	<meta name="og:image" content="https://static.facebook.com/images/whatsapp/www/whatsapp-promo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
	<link rel="stylesheet" href="./css/owl.carousel.min.css">
<link rel="stylesheet" href="./css/owl.theme.default.min.css">
<link rel="stylesheet" href="./css/all.css">
<link rel="stylesheet" href="./css/fonts.css">
<link rel="stylesheet" href="./css/font-awesome.css">
<link rel="stylesheet" href="./css/fontawesome.min.css">
<!-- ------------ AOS Library ------------------------- -->
<link rel="stylesheet" href="./css/aos.css">

<!-- Custom Style   -->
<link rel="stylesheet" href="./css/Style.css">
<link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/cssfile.css">
	<link rel="stylesheet" href="./css/x.css">
	<link rel="stylesheet" href="./css/xx.css">
	
</head>
<body>
	<?php
	 include("menu.php");
	 include("./myPage/php/connect.php");
	 ?>
    <div class="slider" style="min-height:40vh;">
		<!-- fade css -->
		<?php
			$r = $conn->query("SELECT * FROM kursHome WHERE type = '1' ORDER BY id DESC");
			$n = mysqli_num_rows($r);
			if ($n) {
				$row = mysqli_fetch_array($r);
				do {
					echo'
					<div class="myslide fade" style="height:100%;">
						<div class="txt">
							<h1 style="font-size:30px;">'.$row["theme"].'</h1>
							<p style="text-shadow:2px 1px 1px black; color:white">'.$row["text"].'</p>
						</div>
						<img src="'.$row["image"].'" style="max-width:100%">
					</div>
					';
				} while($row = mysqli_fetch_array($r));
			}
		?>
		<!-- /fade css -->
		
		<!-- onclick js -->
		<div class="NP">
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  		<a class="next" onclick="plusSlides(1)">&#10095;</a>
			</div>
		
		<div class="dotsbox" style="text-align:center">
			<?php
				for	($i = 1; $i <= $n; $i++) echo'<span class="dot" onclick="currentSlide('.$i.')"></span>';
			?>
		</div>
		<!-- /onclick js -->
	</div>
	<br>
	<hr>
	<br>
<section style="background:url(./img/bg.png) no-repeat; background-size:cover">
	  <div class = "readBlock"  data-aos="zoom-in" data-aos-delay="300">
		  <?php
			$r = $conn->query("SELECT * FROM kursHome WHERE type = '2' ORDER BY id DESC");
			$n = mysqli_num_rows($r);
			if ($n) {
				$row = mysqli_fetch_array($r);
				do { 
					if(($n--)%2 == 1) {
						echo'
						<div class="container">
								<div class="row">
									<div class="image col" data-aos="fade-right" data-aos-delay="300">
										<img src="'.$row["image"].'" height="400" style="max-width:98%;">
									</div>
									<div class="col" data-aos="fade-left" data-aos-delay="300">
										<h3 style="text-align:center">'.$row["theme"].'</h3>
										<h4 style="width:100%"><p style="width:100%; color:orange;">'.$row["text"].'</p></h4>
									</div>
								</div>
						</div>
						';
					} else 
						echo '
						<div class="container">
								<div class="row">
									<div class="col" data-aos="fade-right" data-aos-delay="300">
										<h3 style="text-align:center">'.$row["theme"].'</h3>
										<h4 style="width:100%"><p style="width:100%; color:orange;"><i>'.$row["text"].'
								</i></p></h4>
									</div>
									<div class="image col" data-aos="fade-left" data-aos-delay="300">
										<img src="'.$row["image"].'" height="400">
									</div>
								</div>
						</div>
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


