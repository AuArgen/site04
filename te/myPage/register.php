<?php
    session_start();
    $log = "Admin";
    $pass = "Admin20210928";
    if ($_SESSION["log"] == $log && $_SESSION["pass"] == $pass) {
        header('Location:./');
    }
    if (isset($_POST["submit"])) {
        if ($_POST["log"] == $log && $_POST["pass"] == $pass) {
            $_SESSION["log"] = $log;
            $_SESSION["pass"] = $pass;
            header('Location:./');
        } else {
            echo '
                <script>
                    alert("Не правильный логин или пароль!");
                </script>
            ';
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign in</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="imgs/wave.png">
	<div class="container">
		<div class="img">
			<img src="imgs/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="post">
				<img src="imgs/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name= "log">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name = "pass">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login" name="submit">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>