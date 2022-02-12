<?php
    session_start();
    if ($_SESSION["log"] != 'Admin' || $_SESSION["pass"] != "Admin20210928") {
        header('Location:../register.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить уроки</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/all.css">
    <link rel="stylesheet" href="../../css/fonts.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/style2.css">
    <link rel="stylesheet" href="../../css/cssfile.css">
	<link rel="stylesheet" href="../../css/x.css">
	<link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <?php include("./menu.php"); include("./connect.php");?>
    <div class="container homeContainer">
        <form action="" method="post" class="form-control" enctype="multipart/form-data">
            <hr>
            <table class="table">
                <?php
                    $id = $_GET["id"];
                    $typ = $_GET["type"];
                    $ids = $_GET["ids"];
                    $r = $conn -> query("SELECT * FROM kursVideo WHERE id = '$id'");
                    $n = mysqli_num_rows($r);
                    if ($n) {
                        $row = mysqli_fetch_array($r);
                        
                            echo '
                              <div class="form-control btn btn-success"><h2 class = "fas fa-sliders"> Сабакты озорту</h2> </div>
                              ';
                        do {
                            echo '
                            <div class="p-5 text-center">
                                <input type="text" name="theme" id="theme" class="form-control" placeholder = "Сабакка тема ..." value="'.$row["theme"].'" required>
                                <br>
                                <input type="text" name="test" id="test" class="form-control" placeholder = "Сабак учун тестин ссылкасы ..." value="'.$row["test"].'">
                                <br>
                                <div style="display:flex">
                                    <label for="doc"><i style= "cursor:pointer;" class="fas fa-files-o btn btn-warning" aria-hidden="true"> Тапшырма учун докумет же файл </i></label>
                                    <input type="file" name="doc" id="doc" class="form-control" style="display:block;" value="'.$row["file"].'">
                                </div>
                                <input type="hidden" value = "'.$row["file"].'" name = "h3">
                                <input type="hidden" value = "'.$row["video"].'" name = "h4">
                                <input type="hidden" value = "'.$row["youTube"].'" name = "youTube">
                                <br>
                                <div style="display:flex;">
                                    <label for="video"><i style= "cursor:pointer" class="fas fa-video btn btn-warning" aria-hidden="true"> Видео сабак </i> </label>
                                    <input type="text" name="video" id="video" class="form-control" style="display:block;" value="'.$row["video"].'">
                                </div>
                                <iframe src = "'.$row["video"].'" frameborder="0" allowfullscreen width="600" height="400"></iframe>
                                <br><p class=""><button type="submit" name="submit4" class=" btn btn-outline-success"> <i class="fas fa-hdd-o"> Сохранить</i> </button> </p>           
                            </div>
                            ';
                        } while($row = mysqli_fetch_array($r));
                    }
                ?>
            </table>
				<script src="./js/jquery.js"></script>
    <script src="./js/menu.js"></script>
			<script src="./qr/qrcode.js"></script>
<div id="qrcode" style="width:150px; height:150px; margin-top:15px;"></div>
<br />
			<br>
			<br>
<script type="text/javascript">
        document.querySelector(".kurs").style.borderBottom = "2px solid green";

var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 200,
	height : 200
});

function makeCode () {		
	var elText = window.location.href, n = 0,q = 0, s = "";
	for (let i = 0; i < elText.length; i++) {
		if (elText[i] === '/')n++;
		if (n < 3 || q ) s += elText[i];
		if (elText[i] === '?') {
			q++;
			s += "/vide.php?";
			break;
		}
	}	
	elText = s+"<?php echo 'video='.$id.'&type='.$typ.'&id='.$ids.''?>";
	if (!elText) {
		alert("Input a text");
		elText.focus();
		return;
	}
	
	qrcode.makeCode(elText);
}

makeCode();

$("#text").
	on("blur", function () {
		makeCode();
	}).
	on("keydown", function (e) {
		if (e.keyCode == 13) {
			makeCode();
		}
	});
</script>
        </form>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
    </div>
    <?php include("./update.php");?>
    <script>
    </script>
</body>
</html>