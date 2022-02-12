<?php
    include("./myPage/php/connect.php");
    $id = $_GET["id"];
    $r = $conn ->query("SELECT * FROM kursELP WHERE Code ='$id'");
	if (!mysqli_num_rows($r)) header("Location: ./register.php");
    if (isset($_POST["submit"])) {
        $l = $_POST["pas"];
        $p = $_POST["pass"];
        if ($l == $p) {
            if ( $conn -> query ("UPDATE kursELP SET Code = '' WHERE Code = '$id'")) echo '<script>alert("Сакталды")</script>';
            header("Location: ./register.php");
        } else {
            echo '<script>alert("Паролдор бирдей эмес!!!")</script>';
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Пароль өзгөртүү</title>
	<link rel="stylesheet" type="text/css" href="./myPage/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="./myPage/imgs/wave.png">
	<div class="container">
		<div class="img">
			<img src="./myPage/imgs/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="post">
				<img src="./myPage/imgs/avatar.svg">
				<h2 class="title">Пароль өзгөртүү</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Пароль </h5>
           		   		<input type="password" class="input" minLength="6" maxLenght="8" name= "pas" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Пароль салыштыруу</h5>
           		    	<input type="password" minLength="6" maxLenght="8" class="input" name = "pass" required>
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Сактоо" name="submit">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="./myPage/js/main.js"></script>
</body>
</html>