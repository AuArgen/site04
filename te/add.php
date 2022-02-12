<?php
    include("./myPage/php/connect.php");
    if (isset($_POST["submit"])) {
        $e = $_POST["email"];
        $l = $_POST["log"];
        $p = $_POST["pass"];
		$r = $conn ->query("SELECT * FROM kursELP WHERE email ='$e'");
		if (mysqli_num_rows($r)) echo '<script> alert ("Мындай Email буга чейин катталган!!!");</script>';
		else {
			$r = $conn ->query("SELECT * FROM kursELP WHERE login ='$l' AND password ='$p'");
			if (mysqli_num_rows($r)) echo '<script> alert ("Мындай Login жана Password буга чейин катталган сураныч бакшка жазыныз!!!");</script>';
			else {
				$conn -> query ("INSERT INTO kursELP(email, login, password,Code,testID,geo,org,fname,sname,testIndex,testLast,hod) VALUES('$e', '$l', '$p','','','','','','','1','0','0');");
				if ($_GET["type"] == 4)header("Location: ./register.php?type=4");
				else header("Location: ./register.php");
			}
		}
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Катталуу</title>
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
				<h2 class="title">Катталуу</h2>
                <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-email"><b>@</b></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Емайл</h5>
           		   		<input type="email" class="input" minLength="6" maxLenght="12" name= "email" required>
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Логин</h5>
           		   		<input type="text" class="input" minLength="6" maxLenght="12" name= "log" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Пароль</h5>
           		    	<input type="password" minLength="6" maxLenght="8" class="input" name = "pass" required>
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Каттоо" name="submit">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="./myPage/js/main.js"></script>
</body>
</html>