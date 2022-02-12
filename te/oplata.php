<?php
    session_start();
    $log = $_SESSION["log"];
    $pass = $_SESSION["pass"];
    include("./myPage/php/connect.php");
    $r = $conn -> query("SELECT * FROM kursELP WHERE login = '$log' and password = '$pass'");
    if (!mysqli_num_rows($r)) header("Location:./register.php?type=4");

    // if ($y == $y2) {
    //     if ($m == $m2) {
    //         if ($d == $d2 || $d == $d2 + 1) {
    //             if ($H == $H2 && $i >= $i2 || $H < $H2 ) {
    //                 header('Location: ./jrtGo.php');
    //             } header('Location: ./jrt.php');
    //         } header('Location: ./jrt.php');
    //     } else header('Location: ./jrt.php');
    // } else header('Location: ./jrt.php'); 


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестке катталуу</title>
	<link rel="stylesheet" href="./css/owl.carousel.min.css">
<link rel="stylesheet" href="./css/owl.theme.default.min.css">
<link rel="stylesheet" href="./css/all.css">
<link rel="stylesheet" href="./css/fonts.css">
<!-- ------------ AOS Library ------------------------- -->
<link rel="stylesheet" href="./css/aos.css">
<link rel="stylesheet" href="./css/cssfile.css">
<!-- Custom Style   -->
<link rel="stylesheet" href="./css/Style.css">
<link rel="stylesheet" href="./css/style2.css">
<link rel="stylesheet" href="./css/x.css">
	<link rel="stylesheet" href="./css/xx.css">
	<link rel="stylesheet" href="./css/xxx.css">
	<!-- <link rel="stylesheet" href="./css/jrt.css"> -->
</head>
<body>
	<?php
	 include("menu.php");     ?>
	<br>
    <section id="plays">
        <div class="">
            <div class="row" style="margin-top:40px; background:black; color:white;padding: 20px 20px" ><b style="color:orange"><a href="./">Башкы бет/</a><a href="./jrt.php">ЖРТ тест/</a>Тестке катталуу </b></div>
        </div>
    </section>
<section class="container">
    <br>
<?php
    $res = $conn -> query("SELECT * FROM kursTest");
    $testid;
    $buy = 0;
    if (mysqli_num_rows($res)) {
        $row = mysqli_fetch_array($res);
        do {
            $testid = $row["id"];
            $buy = $row["buy"];
                                    $e = substr($row["datatime"],11,2);
                        $w = $row["kuntun"];
                        if ($w) {
                            $e = $e + 12;
                        }
echo'


        <div class="dateTime" style="display:none"><a href="./register.php?type=4" style="text-align:center">'.substr($row["datatime"],0,10).', '.$e.''.substr($row["datatime"],13,6).':00</a></div>

';
        } while ($row = mysqli_fetch_array($res));
    }
    $res = $conn -> query("SELECT * FROM kursELP WHERE login = '$log' and password = '$pass'");
    if (mysqli_num_rows($res)) {
        $row = mysqli_fetch_array($res);
        do {
                if ($row["testID"] != $testid.'') {
                    header('Location: ./jrtSecond.php');
            }
        } while ($row = mysqli_fetch_array($res));
    }
    $res = $conn -> query("SELECT * FROM kursELP WHERE login = '$log' and password = '$pass'");
    $hod=0;
    if (mysqli_num_rows($res)) {
        $row = mysqli_fetch_array($res);
        do {
            $hod = $row["hod"];
     {
                echo '
                    <div class="container">
                        <form class="form-control" method="post">
                            <h2 style = "color : green; text-align:center; width:100%">Урматтуу '.$row["sname"].' '.$row["fname"].' сиз ийгиликтуу тестке катталдыныз!</h2>
                            <br>
                            <h3 style = "color : orange; text-align:center; width:100%; '.(($buy == 0 || ($hod !=""&& $hod != '0'))? 'display:none;':'').'">Эми сиз '.$row["sname"].' '.$row["fname"].' тестти убагында иштоо учун <b style = "color:#3f4954" class="fas fa-mobile-alt" aria-hidden="true"> +996551002257</b> 
                            ушул номерге 200 единица салып анан ушул <br> <a href="https://api.whatsapp.com/send?phone=+996778030374" class="fab fa-whatsapp" aria-hidden="true" style="color:green"> <a href="https://api.whatsapp.com/send?phone=+996778030374"><strong> +996778030374</strong></a></a> ватсап номерге чектин же болбосо акча салганынызды делилдеп суротко тартып ватсаптан жибериниз
                            жана ушул сизидин <b style = "color:#3f4954">('.$row["id"].')</b> коддунуз ушунуда кошуп жибеорин!</h3>
                            <br>
                        </form>
                    </div>
                ';
            }
        } while ($row = mysqli_fetch_array($res));
    }

?> 
<br><br><br><br><br><br><br><br><br><br>
</section>
<hr>
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
<script>


  let d = document.querySelector(".dateTime").textContent
        let w = [31,31+28,31+31+28,30+31+31+28,31+30+31+31+28,30+31+30+31+31+28,31+30+31+30+31+31+28,31+31+30+31+30+31+31+28,30+31+31+30+31+30+31+31+28,31+30+31+31+30+31+30+31+31+28,30+31+30+31+31+30+31+30+31+31+28,31+30+31+30+31+31+30+31+30+31+31+28]
        let fy = +d.substr(0,4)
        let fm = +d.substr(5,2)
        let fd = +d.substr(8,2)
        let fh = +d.substr(12,2)
        let fmi = +d.substr(15,2)
        let fs = +d.substr(18,2)
        let r;
        if (fm == 1) r = w[11]*fy+Math.floor(fy/4)+fd
        else r = w[11]*fy+Math.floor(fy/4)+ w[fm-2]+ fd
        if (fy % 4 == 0 && fm < 3 && fd < 29) r--;
        setInterval(() => {
            if (document.querySelector(".dateTime>a")) {
            document.querySelector(".dateTime>a").innerHTML = d + "<br>";
            let date = new Date()
            let dy = date.getFullYear();
            let dm = date.getMonth()+1;
            let dd = date.getDate();
            let th = Math.floor(date.getHours());
            // if (!th) th = 1
            let tm = date.getMinutes();
            let ts = date.getSeconds();
            let r2
            if (dm == 1) r2 = w[11]*dy+Math.floor(dy/4)+dd
            else r2 = w[11]*dy+Math.floor(dy/4)+ w[dm-2]+ dd
            console.log (r,r2)
            if (dy % 4 == 0 && dm < 3 && dd < 29) r2--;
                let r3 = r
                r = r - r2 
                if (r < 0) {
                    th += (r2-r3)*24 
                    r = 0
                }
                let qh = fh
                qh += r * 24
                tm += th * 60
                let qm = fmi + qh * 60
                ts += tm * 60 
                let qs = fs + qm * 60 
                if (qs < ts) {
                    qs += 24*3600 - ts
                    if (qs >= 0) {
                        if ('<?php echo $buy?>' == '1' && ('<?php echo $hod?>' == '1' || '<?php echo $hod?>' == "") ) {
                           qs = 0;
                        }else
                        return window.location.replace("./jrtTestVar.php");
                    }
                    // console.log(qs, ts,th)
                }
                else {
                    qs = qs - ts
                    console.log (qs, ts,r,fh,qh,th, tm)
                    r = r3
                    dd = Math.floor(qs/86400)
                    qs %= 86400
                    th = Math.floor(qs/3600)
                    qs %= 3600
                    tm = Math.floor(qs/60)
                    ts = qs % 60
                    // console.log(Math.floor(qs/86400))
                    // document.querySelector(".dateTime>a").innerHTML +=  dd + ":" + th + ":" + tm + ":" + ts;
                }
                r = r3
        }
        }, 100);

    function videos(x) {
        if (document.querySelector(`.videoNot`))document.querySelector(`.videoNot`).classList.toggle("videoNot");
        document.querySelector(`.video${x}`).classList.toggle("videoNot");
            $.ajax({
                url:'./sawME.php',
                type:'POST',
                cache:false,
                data:{x},
                dataType:'html',
                success: function (data) {
                  document.querySelector(`.play`).innerHTML = data;
                }
            });
        window.location.replace("#plays");
    }
    alert ("Сиз ийгиликтуу тестке катталдыныз!")
</script>
</body>
</html>


