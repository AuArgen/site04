<script src="https://use.fontawesome.com/addbab05b6.js"></script>
<?php
session_start();
$l = $_SESSION["log"] ;
$p = $_SESSION["pass"];
?>
<header>
		<div id="logo">Colon<span id="logo-s">code</span></div>
		<i class="fas fa-bars" aria-hidden="true"></i>
		<div class="divBars">
			<div class="user sign">
				<?php
				
					if ($l!= '' && $p != '') {
						echo '<div class="act circle circlejs">'.substr($_SESSION["log"],0,1).'</div>
						<nav class="nav">
						<div class="rectangle">'.$_SESSION["email"].'</div>
						<div class="sing-out"><i style="width:100%" class="fa fa-sign-out" aria-hidden="true">Чыгуу</i></div>
						</nav>
						';
					} else echo'<a href="./register.php?id=1" class="act">Кирүү</a>';
				?>
			</div>
			<span class="sign"><a class="act" href="./about.php">Биз</a></span>
			<span class="sign"><a class="act" href="./jrt.php">ЖРТ тест</a></span>
			<span class="sign kurstar" style="cursor:pointer;"><a class="act">Курстар <i class="fas fa-caret-down" aria-hidden="true"></i></a>
			<ul class="ulKurstar">
				<a href="./math.php"><li>Математика</li></a>
				<a href="./k-til.php"><li>Кыргыз-тили</li> </a>
				<a href="./sat.php"><li>SAT</li> </a>
			</ul>
		</span>
			<span class="sign"><a class="act" href="./">Башкы бет</a></span>
		</div>
</header>
<script>
</script>
<script src="./js/jquery.js"></script>
<script src="./js/menu.js"></script>