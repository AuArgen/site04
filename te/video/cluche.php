<?php
    include("./myPage/php/connect.php");
    if (isset($_POST["submit"])) {
        $e = $_POST["email"];
        $r = $conn ->query("SELECT * FROM kursELP WHERE email ='$e'");
		if (!mysqli_num_rows($r)) echo '<script> alert ("Мындай Email буга чейин катталган эмес!!!");</script>';
        else {
            include("./sendMailer.php");

            header("Location: ./register.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Жөнөтүү</title>
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
           		   		<i class="fas fa-email"><b>@</b></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Емайл</h5>
           		   		<input type="email" class="input" minLength="6" maxLenght="12" name= "email" required>
           		   </div>
           		</div>
            	<input type="submit" class="btn" value="Жөнөтүү" name="submit">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="./myPage/js/main.js"></script>
</body>
</html>