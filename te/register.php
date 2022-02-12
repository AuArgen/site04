<?php
	ob_start();
    session_start();
	$log = $_SESSION["log"];
    $pass = $_SESSION["pass"];
    include("./myPage/php/connect.php");
    // unset($_SESSION["log"]);
    if ($_SESSION["log"]&& $_SESSION["pass"]) {
		$typ = $_GET["type"];
		if ($typ == 4) {
		    $r = $conn -> query("SELECT * FROM kursELP WHERE login = '$log' and password = '$pass'");
   			if (mysqli_num_rows($r)) header('Location:./jrtSecond.php');
		}
        else {
			$r = $conn -> query("SELECT * FROM kursELP WHERE login = '$log' and password = '$pass'");
   			if (mysqli_num_rows($r)) header('Location:./index.php');
		}
    }
    if (isset($_POST["submit"])) {
        $l = $_POST["log"];
        $p = $_POST["pass"];
        $r = $conn -> query ("SELECT * FROM kursELP WHERE login = '$l' AND password = '$p'");
        if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            do {
                $_SESSION["log"] = $l;
                $_SESSION["pass"] = $p;
                $_SESSION["email"] = $row["email"];
				$id = $_GET["id"];
				$typ = $_GET["type"];
				$video = $_GET["video"];
				$m = array("./index.php","./vide.php?id=$id&type=$typ&video=$video","./vide.php?id=$id&type=$typ&video=$video","./vide.php?id=$id&type=$typ&video=$video","./jrtSecond.php");
               if ($typ) header('Location:'.$m[$typ].'');
				else header('Location:'.$m[0].'');
            } while ($row = mysqli_fetch_array($r));
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
				<h2 class="title">Кош келиниз!</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Логин</h5>
           		   		<input type="text" minLength="6" maxLength="12" class="input" name= "log">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Пароль</h5>
           		    	<input type="password" minLength="6" maxLength="8" class="input" name = "pass">
            	   </div>
            	</div>
            	<a href="./cluche.php">Пароль унутунузбу?</a><a href="<?php if ($_GET["type"] == 4) echo "./add.php?type=4"; else echo "./add.php";?>">| Катталуу</a>
            	<input type="submit" class="btn" value="Кирүү" name="submit">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="./myPage/js/main.js"></script>
</body>
</html>