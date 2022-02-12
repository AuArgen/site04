<?php
  ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЖРТ тест</title>
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
<link rel="stylesheet" href="./css/jrt.css">
	
</head>
<body>
	<?php
	 include("menu.php");
	 include("./myPage/php/connect.php");
	 ?>
	<br>
    <section>
        <div class="">
            <div class="row" style="margin-top:40px; background:black; color:white;padding: 20px 20px" ><b style="color:orange"><a href="./">Башкы бет/</a>ЖРТ тест</b></div>
        </div>
    </section>
<section>
    <br>
    <section class="container test"> 
        <h1>
            Онлайн тест тапшыруу!
            <br>
        </h1>
        <br>
        <img src="./img/jrtPG.png" style="max-width:100vw">
        <br>
        <br>
        <div class="newTest">
            <?php
                $r = $conn -> query("SELECT * FROM kursTest");
                if (mysqli_num_rows($r)) {
                    $row = mysqli_fetch_array($r);
                    do {
                        $e = substr($row["datatime"],11,2);
                        $w = $row["kuntun"];
                        if ($w) {
                            $e = $e + 12;
                        }
                        echo'
                        <div class="name"><a href="./register.php?type=4">'.$row["theme"].'</a></div>
                        <div class="dateTime"><a href="./register.php?type=4" style="text-align:center">'.substr($row["datatime"],0,10).', '.$e.''.substr($row["datatime"],13,6).':00</a></div>
                        <div class="reg"><a href="./register.php?type=4">Тестке катталуу</a></div>
                        <div class="count fa fa-man"> <a href="regKol"><img src="./img/user.png" alt=""> x'.$row["people"].'</a></div>
                        ';
                    } while ($row = mysqli_fetch_array($r));
                }
            ?>
        </div>
        <hr>
        <div class="videoUroki">
            <hr>
            <h1>Видео сабактар</h1>
            <div>
                <a href="./math.php">Математика</a>
                <a href="./k-til.php">Кыргыз тили</a>
                <a href="./sat.php">SAT</a>
            </div>
        </div>
        <br><br><br><br><br>
         <table id="customers" class="customers">
                <tr>
                  <th>№</th>
                  <th>АЖ</th>
                  <th>Окуп жаткан мекемеси</th>
                  <th>Аймагы</th>
                  <th>Бал</th>
                </tr>
                <?php
                $testid = 0;
                $count = 1;
                    $r = $conn -> query("SELECT * FROM kursReiting ORDER BY ids+0 DESC ");
                    if (mysqli_num_rows($r)) {
                        $row = mysqli_fetch_array($r);
                        do {                   
                            $testid = $row["ids"];
                            break;
                        } while ($row = mysqli_fetch_array($r));
                    }
                    // echo $testid;
                    $r = $conn -> query("SELECT * FROM kursReiting WHERE ids = '$testid' ORDER BY kol+0 DESC ");
                    if (mysqli_num_rows($r)) {
                        $row = mysqli_fetch_array($r);
                        // echo '
                        //     <div class="box-container">
                        // ';
                        do {                   
                            if ($count < 6) echo'
                            <tr class="green">
                                                <td>'.$count.'</td>
                                                <td>'.$row["sname"].' '.$row["fname"].' </td>
                                                <td>'.$row["org"].'  </td>
                                                <td>'.$row["geo"].' </td>
                                                <td>'.$row["kol"].' </td>
                            </tr>
                            ';    
                            if ($count < 11 && $count > 5)            
                            echo'
                            <tr class="yellow">
                                                <td>'.$count.'</td>
                                                <td>'.$row["sname"].' '.$row["fname"].' </td>
                                                <td>'.$row["org"].'  </td>
                                                <td>'.$row["geo"].' </td>
                                                <td>'.$row["kol"].' </td>
                            </tr>
                            ';       
                            if ($count >= 11)            
                            echo'
                            <tr class="">
                                                <td>'.$count.'</td>
                                                <td>'.$row["sname"].' '.$row["fname"].' </td>
                                                <td>'.$row["org"].'  </td>
                                                <td>'.$row["geo"].' </td>
                                                <td>'.$row["kol"].' </td>
                            </tr>
                            ';
                            $count ++;
                        } while ($row = mysqli_fetch_array($r));
                    }
                ?>
</table>
    </section>
	<br><br><br><br><br>
<?php
	include("./footer.php");
?>
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
        // console.log(r)
        if (fy % 4 == 0 && fm < 3 && fd < 29) r--;
        setInterval(() => {
            if (document.querySelector(".dateTime>a")) {
            document.querySelector(".dateTime>a").innerHTML = d + "<br>";
            let date = new Date()
            let dy = date.getFullYear();
            let dm = date.getMonth()+1;
            let dd = date.getDate();
            let th = Math.floor(date.getHours());
            let tm = date.getMinutes();
            let ts = date.getSeconds();
            let r2
            if (dm == 1) r2 = w[11]*dy+Math.floor(dy/4)+dd
            else r2 = w[11]*dy+Math.floor(dy/4)+ w[dm-2]+ dd
            // console.log (r,r2,dm,w[dm-1]-(w[dm-1]-dd))
            if (dy % 4 == 0 && dm < 3 && dd < 29) r2--;
             {
                let r3 = r
                // console.log(r)
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
                let qs = fs + (qm * 60) 
                if (qs < ts) {
                    qs += 24*3600 - ts
                    document.querySelector(".reg>a").innerHTML = "Тестти итоо болот";
                    document.querySelector(".reg>a").style.color = "green";
                    document.querySelector(".dateTime>a").innerHTML +=  00 + ":" + 00 + ":" + 00 + ":" + 00;
                    if (qs < 0) {
                        document.querySelector(".newTest").innerHTML = ""
                        document.querySelector(".newTest").style.display = "none"
                    }
                    // console.log(qh,qs, qm, fmi, fs, ts, tm, th, r2 , r3)
                }
                else {
                    qs = qs - ts
                    // console.log (qs)
                    dd = Math.floor(qs/86400)
                    qs %= 86400
                    th = Math.floor(qs/3600)
                    qs %= 3600
                    tm = Math.floor(qs/60)
                    ts = qs % 60
                    // console.log(Math.floor(qs/86400))
                    document.querySelector(".dateTime>a").innerHTML +=  (dd < 10?`0${dd}`:dd) + ":" + (th < 10?`0${th}`:th) + ":" + (tm < 10?`0${tm}`:tm) + ":" + (ts < 10?`0${ts}`:ts);
                }
                r = r3
            }
        }
        }, 100);
    </script>
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


