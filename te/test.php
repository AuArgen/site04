<?php
    session_start();
    if ($_SESSION["log"] == '' && $_SESSION["pass"] =='') {
        if ($_POST["type"] == 1)
        header("Location:./register.php?id=2");
        else header("Location:./register.php?id=3");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест</title>
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
            <div class="row" style="margin-top:40px; background:black; color:white;padding: 20px 20px" ><b style="color:orange"><a href="./">Башкы бет/</a> <?php if ($_POST["type"] == "1") echo '<a href="./math.php">Математика/</a> Тест'; else if ($_POST["type"] == 2)  echo '<a href="./k-til.php">Кызгыз-тили/</a>Тест'; else echo '<a href="./sat.php">SAT/</a>Тест';  ?></b></div>
        </div>
    </section>
<section>
    <br>
    <section class="container" style="height:100vh"> 
        <iframe src="<?php echo $_POST["test"]?>" frameborder="0" style="width:100%; height:100%"></iframe>
    </section>
	<br><br><br><br><br>
<?php
	include("./footer.php");
?>
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


