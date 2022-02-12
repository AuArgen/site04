<?php
  ob_start();
?>
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
    <title>Тест</title>
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
    <link rel="stylesheet" href="./css/jrt.css">
	<!-- <link rel="stylesheet" href="./css/jrt.css"> -->
</head>
<body>
<?php
    
?>
<div class="container bg" style="">
        <div class="block">
            <div class="blocks left">
                <div class="left_block1">
                    <img src="./img/test_logo.png" alt="" srcset="" width="140">
                </div>
                <div class="left_left nonePos">
                    <i class="fa fa-chevron-left"></i>
                </div>
            </div>
            <div class="blocks center">
                <div class="zag">
                </div>
                <?php
                    $var = array(
                            1 => 'matem1',
                            2 => 'matem2',
                            3 => 'kyrgyzanalogia',
                            4 => 'kyrgyzokuu',
                            5 => 'kyrgyzpractica' ,
                    );
                    $r = $conn -> query ("SELECT * FROM kursTest");
                    $testid;
                    $testindex;
                    $testLast;
                    $testIDS;
                    $til = $_GET["til"];
                    $testvar;
                    $x = 1;
                    $testvararray = array();
                    $testYes = array();
                    if (mysqli_num_rows($r)) {
                        $row = mysqli_fetch_array($r);
                        do {
                            $testid = $row["id"];
                        } while ($row = mysqli_fetch_array($r));
                    }
                    $r = $conn -> query("SELECT * FROM kursELP WHERE login = '$log' and password = '$pass'");
                    if (mysqli_num_rows($r)) {
                        $row = mysqli_fetch_array($r);
                        do {
                            $testindex = $row["testIndex"];
                            $testLast = $row["testLast"];
                            $testIDS = $row["testID"];
                        } while ($row = mysqli_fetch_array($r));
                    }
                    if ($testid != $testIDS) header("Location:./jrt.php");
                    if ($testid == $testLast) {
                        if ($testindex > 5) header("Location:./jrt.php");
                        $x = $testindex;      
                        // $ti = $testindex + 1;
                        // $conn -> query ("UPDATE kursELP SET testLast = '$testid', testIndex = '$ti' WHERE login = '$log' and password = '$pass'");
                        $testvar = $var[$x].''.$til;
                        // var_dump($testvar);
                        $r = $conn -> query("SELECT * FROM kursTestVar WHERE type = '$testvar'");
                        if (mysqli_num_rows($r)) {
                            $row = mysqli_fetch_array($r);
                            do {
                                $testvararray[] = $row["id"];
                            } while ($row = mysqli_fetch_array($r));
                        } else {
                            header("Location:./jrtTestVar.php");
                        }
                        foreach ($testvararray as $value) {
                            $r = $conn -> query("SELECT * FROM kursTestImg WHERE ids = '$value'");
                            if(mysqli_num_rows($r)) $testYes[] = $value;
                        }
                        $random = (rand(0,sizeof($testYes)-1));
                        $value = $testYes[$random];
                        $count = 0;
                        $r = $conn -> query("SELECT * FROM kursTestImg WHERE ids = '$value'");
                        if (mysqli_num_rows($r)) {
                            $row = mysqli_fetch_array($r);
                            do {
                                // $testvararray[] = $row["id"];
                                $count++;
                                echo'
                                    <img src="'.$row["image"].'" alt="" class="img'.$count.' '.($count == 1?"img_active":"").'">
                                    <img src="'.$row["image"].'" alt="" class="img2_'.$count.' '.($count == 1?"img_active2":"").'">
                                    <input type="hidden" name="" class="kol_ot'.$count.'" value = "'.$row["ot"].'">
                                    <input type="hidden" name="" class="kol_do'.$count.'" value = "'.$row["do"].'">
                                    ';
                                } while ($row = mysqli_fetch_array($r));
                                echo '<input type="hidden" name="" class="kol_img" value = "'.$count.'">';
                            }else {
                            header("Location:./jrtTestVar.php");
                        }                        
                    } else {
                        // $conn -> query ("UPDATE kursELP SET testLast = '$testid', testIndex = '2' WHERE login = '$log' and password = '$pass'");
                        $testvar = $var[1].''.$til;
                        $testindex = 1;
                        // var_dump($testvar);
                        $r = $conn -> query("SELECT * FROM kursTestVar WHERE type = '$testvar'");
                        if (mysqli_num_rows($r)) {
                            $row = mysqli_fetch_array($r);
                            do {
                                $testvararray[] = $row["id"];
                            } while ($row = mysqli_fetch_array($r));
                        }else {
                            header("Location:./jrtTestVar.php");
                        }
                        foreach ($testvararray as $value) {
                            $r = $conn -> query("SELECT * FROM kursTestImg WHERE ids = '$value'");
                            if(mysqli_num_rows($r)) $testYes[] = $value;
                        }
                        $random = (rand(0,sizeof($testYes)-1));
                        $value = $testYes[$random];
                        $count = 0;
                        $r = $conn -> query("SELECT * FROM kursTestImg WHERE ids = '$value'");
                        if (mysqli_num_rows($r)) {
                            $row = mysqli_fetch_array($r);
                            do {
                                // $testvararray[] = $row["id"];
                                $count++;
                                echo'
                                    <img src="'.$row["image"].'" alt="" class="img'.$count.' '.($count == 1?"img_active":"").'">
                                    <img src="'.$row["image"].'" alt="" class="img2_'.$count.' '.($count == 1?"img_active2":"").'">
                                    <input type="hidden" name="" class="kol_ot'.$count.'" value = "'.$row["ot"].'">
                                    <input type="hidden" name="" class="kol_do'.$count.'" value = "'.$row["do"].'">
                                    ';
                                } while ($row = mysqli_fetch_array($r));
                                echo '<input type="hidden" name="" class="kol_img" value = "'.$count.'">';
                            }else {
                            header("Location:./jrtTestVar.php");
                        }
                    }
                ?>
                <!-- <img src="./img/IMG-2022-01-23-11-52-32568k.jpeg" alt="" class="img1 img_active">
                <img src="./img/IMG-2022-01-26-02-35-15617k.jpeg" alt="" class="img2">
                <img src="./img/IMG-2022-01-26-02-35-34663k.jpeg" alt="" class="img3">
                <img src="./img/IMG-2022-01-26-02-35-50301k.jpeg" alt="" class="img4"> -->
            </div>
            <div class="blocks right">
                <div class="right_block1">
                    <img src="./img/clock.jpg" alt="" srcset="" width="70">
                    <h5>Калган убакыт:</h5>
                    <p><b class = "clockWatch">00:00:00</b></p>
                </div>
                <div class="right_right">
                    <i class="fa fa-chevron-right"></i>
                </div>
            </div>
            <div class="answer"></div>
        </div>
</div>
<input type="hidden" name="" id="testLast" value = "<?php echo $testLast?>">
<input type="hidden" name="" id="testindex" value = "<?php echo $testindex?>">
<input type="hidden" name="" id="testid" value = "<?php echo $testid?>">
<input type="hidden" name="" id="value" value = "<?php echo $value?>">
<?php
  $res = $conn -> query("SELECT * FROM kursTest");
    $testid = 0;
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
    
        $hod=0;
    if (mysqli_num_rows($res)) {
        $row = mysqli_fetch_array($res);
        do {
            $hod = $row["hod"];
        } while ($row = mysqli_fetch_array($res));
    }
?>
<!-- <form method = "POST" action="" >
    <input type="submit" value="" name="sum" class="sum" id = "sum" style="display:none;" >
    <?php
        if (isset($_POST["sum"])) {
            $answers = array();
            for ($i=1; $i <= 6; $i++) { 
                for ($j=1; $j <= 5; $j++) { 
                   if ($_POST['radio'.$i.'_'.$j.'']) $answers[] = $_POST['radio'.$i.'_'.$j.''];
                   else $answers[] = "Q";
                }
            }
            print_r($answers);
        }
    ?>
</form> -->
<!-- <script src="./js/jsfile.js"></script> -->
    <!-- Jquery Library file -->
    <script src="./js/Jquery3.4.1.min.js"></script>

    <!-- --------- Owl-Carousel js ------------------->
    <script src="./js/owl.carousel.min.js"></script>

    <!-- ------------ AOS js Library  ------------------------- -->
    <script src="./js/aos.js"></script>

    <!-- Custom Javascript file -->
    <script src="./js/main.js"></script>
<script>
    // document.querySelector("#sum").onclick = ()=> {
    //     document.querySelector("#sum").preventDefault();
    // }
    if (window.innerWidth < 700)document.querySelector(".bg").scrollTo(210,0)
     if ('<?php echo $buy?>' == '1' && ('<?php echo $hod?>' == '1' || '<?php echo $hod?>' == "") ) {
    alert ("Бул тест акылуу сиз акы тологон эмес экенсиз, тести бир кун боюу иштесе болот акы толоп кайра кирип корун :)")
    window.location.replace("./");
}
    window.onkeydown = ()=> {
        return false;
    }
    document.querySelector("body").oncontextmenu = () => {
        return false;
    }
    let re = 0
    let isBoss;
    // setInterval(() => {
    //     // if (re == 100) 
    //     isBoss = confirm("Ты здесь главный?")
    //     if (isBoss) document.querySelector(".sum").click()
    //     re++
    //     console.log(re)
    // }, 10000);
    // console.log(document.querySelector(".sum").onclick)
    document.querySelector(".answer").innerHTML = "<h5>Математика I</h5><div class='answers'></div>"
    let ans = 1,lim = 1800;
    if ('<?php echo $testindex?>' == '2') {
        ans = 31;
        lim = 3600;
        document.querySelector(".answer").innerHTML = "<h5>Математика II</h5><div class='answers'></div>"
    }
    if ('<?php echo $testindex?>' == '3'){
        document.querySelector(".answer").innerHTML = "<h5>Окшоштуктар жана суйломдорду толуктоо</h5><div class='answers'></div>"
    }
    if ('<?php echo $testindex?>' == '4') {
        lim = 3600;
        document.querySelector(".answer").innerHTML = "<h5>Окуу жана тушунуу</h5><div class='answers'></div>"
    }
    if ('<?php echo $testindex?>' == '5') {
        lim = 2100;
        document.querySelector(".answer").innerHTML = "<h5>Кыргыз тилинин практикасы</h5><div class='answers'></div>"
    }
    for (let i = 1; i <= 6; i++) {
        let ad = ""
        if ('<?php echo $testindex?>' == '2') ad = "<div>Д</div>"
        let a = `
        <div class='answer_block'> 
            <div class='answer_blocks'>
                <div> </div>        
                <div>А</div>        
                <div>Б</div>        
                <div>В</div>        
                <div>Г</div>  
                ${ad} 
            </div>     
        `;
        for (let j = 1; j <= 5; j++) {
            let d = "";
            if ('<?php echo $testindex?>' == '2') {
                d = `<div> <input type="radio" disabled name="radio${i}_${j}" class="radio${i}_${j}_5" id ="radio${i}_${j}_5" onclick="variant(${i},${j},5,'Д',${ans})" value = "Д"><label for="radio${i}_${j}_5" class="label${i}_${j}_5"></label> </div>`
            }
            a += `
            <div class='answer_blocks'>
                <div class="ans${ans}"> ${ans} </div>
                <div> <input type="radio" disabled name="radio${i}_${j}" class="radio${i}_${j}_1" id ="radio${i}_${j}_1" onclick="variant(${i},${j},1,'А',${ans})" value = "А"><label for="radio${i}_${j}_1" class="label${i}_${j}_1"></label> </div>
                <div> <input type="radio" disabled name="radio${i}_${j}" class="radio${i}_${j}_2" id ="radio${i}_${j}_2" onclick="variant(${i},${j},2,'Б',${ans})" value = "Б"><label for="radio${i}_${j}_2" class="label${i}_${j}_2"></label> </div>
                <div> <input type="radio" disabled name="radio${i}_${j}" class="radio${i}_${j}_3" id ="radio${i}_${j}_3" onclick="variant(${i},${j},3,'В',${ans})" value = "В"><label for="radio${i}_${j}_3" class="label${i}_${j}_3"></label> </div>
                <div> <input type="radio" disabled name="radio${i}_${j}" class="radio${i}_${j}_4" id ="radio${i}_${j}_4" onclick="variant(${i},${j},4,'Г',${ans})" value = "Г"><label for="radio${i}_${j}_4" class="label${i}_${j}_4"></label> </div>
                ${d}
            </div>
            `;
            ans++;
        }
        a += "</div>"
        document.querySelector(".answers").innerHTML += a;
    }



    let kol_img = +document.querySelector(".kol_img").value;
    let kol_count = 1;
    document.querySelector(".left_left").onclick = () => {
        if (kol_count > 1) {
            kol_count--;
            if (kol_count == 1) {
                document.querySelector(".left_left").classList.toggle("nonePos")
            }
            if (kol_count+1 == kol_img) {
                // document.querySelector(".nonePos").classList.toggle("right_right")
                document.querySelector(".right_right").classList.toggle("nonePos")
            }
            document.querySelector(".img_active").classList.toggle("img_active")
            document.querySelector(".img_active2").classList.toggle("img_active2")
            document.querySelector(".img"+kol_count).classList.toggle("img_active")
            document.querySelector(".img2_"+kol_count).classList.toggle("img_active2")
            disabled(kol_count)
        }
    }
    document.querySelector(".right_right").onclick = () => {
        if (kol_count < kol_img) {
            kol_count++;
            if (kol_count == kol_img) {
                document.querySelector(".right_right").classList.toggle("nonePos")
            }
            if (kol_count == 2) {
                // document.querySelector(".nonePos").classList.toggle("left_left")
                document.querySelector(".left_left").classList.toggle("nonePos")
            }
            document.querySelector(".img_active").classList.toggle("img_active")
            document.querySelector(".img_active2").classList.toggle("img_active2")
            document.querySelector(".img"+kol_count).classList.toggle("img_active")
            document.querySelector(".img2_"+kol_count).classList.toggle("img_active2")
            disabled(kol_count)
        }
    }

let rch = [31]
for (let i = 0; i < 31; i++) {
    rch[i] = 0
}
let rla1 = [31]
let rla2 = [31]
let rans = [31]
function variant (a,b,c,d,e) {
    if ('<?php echo $testindex?>' == '2') e -= 30;
    // alert(a,b,c,d)
    if (b < 0) {
        let answe = "";
        let testLast = document.querySelector("#testLast").value
        let testindex = document.querySelector("#testindex").value
        let testid = <?php echo $testid?>;
        let value = <?php echo $value?>;
        for (let i = 1; i <= 30; i++) {
            const el= rans[i]; 
            if (!el) answe +='Я,'
            else answe += rans[i]+','
            
        }
        console.log(answe,testLast,testid,testindex,value)
            $.ajax({
                url:'./saveAnswer.php',
                type:'POST',
                cache:false,
                data:{answe,testLast,testid,testindex,value},
                dataType:'html',
                success: function (data) {
                //   document.querySelector(`.play`).innerHTML = data;
                let da = ""+data;
                    // if (da === `
                    // `) {
                     console.log (da)
                        let isBoss = confirm("Улантуу учун ОК тыныгуу учун отмена?");
                        if (isBoss) window.location.replace("./jrtTest.php?til=<?php echo $til?>");
                        else window.location.replace("./jrtTestVar.php");
                    // }
                    // else
                }
            });
        return;
    }
    if (+rch[e] == 2) {
        document.querySelector(`.radio${a}_${b}_${c}`).checked = false
    }
    if (+rch[e] == 1 && rla1[e] != `.label${a}_${b}_${c}`) {
        rch[e] = 2;
        rla2[e] = `.label${a}_${b}_${c}`
        rans[e] = d
        document.querySelector(`.label${a}_${b}_${c}`).classList.toggle("label_rectangle")
    }
    if (+rch[e] < 1) {
        rch[e] = 1;
        rla1[e] = `.label${a}_${b}_${c}`
        rans[e] = d
        document.querySelector(`.label${a}_${b}_${c}`).classList.toggle("label_circle")
    }
// console.table(rans)
}


function disabled (x) {
    // disabled="disabled"
    if ('<?php echo $testindex?>' == '1')
        if (x == 1) {
            document.querySelector(".zag").innerHTML = "<img src = './img/m1bg.png' alt=''>"
            document.querySelector(".zag").style.maxHeight = "450px"
            document.querySelector(".zag").style.minHeight = "450px"
        } else if (x == 2) {
            document.querySelector(".zag").innerHTML = "<img src = './img/m1bg2.png' alt='' height='140'>"
            document.querySelector(".zag").style.maxHeight = "140px"
            document.querySelector(".zag").style.minHeight = "140px"
        }
    if ('<?php echo $testindex?>' == '2')
        if (x == 1) {
            document.querySelector(".zag").innerHTML = "<img src = './img/m2bg.png' alt=''>"
            document.querySelector(".zag").style.maxHeight = "300px"
            document.querySelector(".zag").style.minHeight = "300px"
        } else if (x == 2) {
            document.querySelector(".zag").innerHTML = ""
            document.querySelector(".zag").style.maxHeight = "0px"
            document.querySelector(".zag").style.minHeight = "0px"
        }
    if ('<?php echo $testindex?>' == '3')
        if (x == 1) {
            document.querySelector(".zag").innerHTML = "<img src = './img/m3bg.png' alt=''>"
            document.querySelector(".zag").style.maxHeight = "300px"
            document.querySelector(".zag").style.minHeight = "300px"
        } else if (x == 2) {
            document.querySelector(".zag").innerHTML = ""
            document.querySelector(".zag").style.maxHeight = "0px"
            document.querySelector(".zag").style.minHeight = "0px"
        } else if (x == 3) {
            document.querySelector(".zag").innerHTML = "<img src = './img/m3bg2.png' alt=''>"
            document.querySelector(".zag").style.maxHeight = "190px"
            document.querySelector(".zag").style.minHeight = "190px"
        } else {
            document.querySelector(".zag").innerHTML = ""
            document.querySelector(".zag").style.maxHeight = "0px"
            document.querySelector(".zag").style.minHeight = "0px"           
        }
    if ('<?php echo $testindex?>' == '4')
        if (x == 1) {
            document.querySelector(".zag").innerHTML = "<img src = './img/m4bg.png' alt=''>"
            document.querySelector(".zag").style.maxHeight = "200px"
            document.querySelector(".zag").style.minHeight = "200px"
        } else if (x == 2) {
            document.querySelector(".zag").innerHTML = ""
            document.querySelector(".zag").style.maxHeight = "0px"
            document.querySelector(".zag").style.minHeight = "0px"
        }
    if ('<?php echo $testindex?>' == '5')
        if (x == 1) {
            document.querySelector(".zag").innerHTML = "<img src = './img/m5bg.png' alt=''>"
            document.querySelector(".zag").style.maxHeight = "400px"
            document.querySelector(".zag").style.minHeight = "400px"
        } else if (x == 2) {
            document.querySelector(".zag").innerHTML = ""
            document.querySelector(".zag").style.maxHeight = "0px"
            document.querySelector(".zag").style.minHeight = "0px"
        }
    let count = 1;
    if ('<?php echo $testindex?>' == '2') count = 31
    let ot = +document.querySelector(".kol_ot"+x).value
    let doo = +document.querySelector(".kol_do"+x).value
    for (let i = 1; i <= 6; i++) {
        for (let j = 1; j <= 5; j++) {
            document.querySelector(`.ans${count}`).style.color="black"
            document.querySelector(`.radio${i}_${j}_1`).removeAttribute("disabled");
            document.querySelector(`.radio${i}_${j}_2`).removeAttribute("disabled");
            document.querySelector(`.radio${i}_${j}_3`).removeAttribute("disabled");
            document.querySelector(`.radio${i}_${j}_4`).removeAttribute("disabled");
            if ('<?php echo $testindex?>' == '2')
            document.querySelector(`.radio${i}_${j}_5`).removeAttribute("disabled");
            if (count > doo || count< ot) {
                document.querySelector(`.ans${count}`).style.color="rgba(128,128,128,0.5)"
                document.querySelector(`.radio${i}_${j}_1`).setAttribute("disabled", "disabled");
                document.querySelector(`.radio${i}_${j}_2`).setAttribute("disabled", "disabled");
                document.querySelector(`.radio${i}_${j}_3`).setAttribute("disabled", "disabled");
                document.querySelector(`.radio${i}_${j}_4`).setAttribute("disabled", "disabled");
                if ('<?php echo $testindex?>' == '2')
                document.querySelector(`.radio${i}_${j}_5`).setAttribute("disabled", "disabled");
            }
            count ++;
        }
    }
}
disabled(1)
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
                    if (qs < 0) 
                    window.location.replace("./");
                    // console.log(qs, ts)
                }
                else {
                    window.location.replace("./");
                    // console.log(Math.floor(qs/86400))
                    // document.querySelector(".dateTime>a").innerHTML +=  dd + ":" + th + ":" + tm + ":" + ts;
                }
                r = r3
        } else
                    window.location.replace("./");

        }, 100);

    function ansTest(x) {
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
    let localNumber = 1
    if (!localStorage.getItem("ArgenNumber")) localStorage.setItem("ArgenNumber",1)
    else  {
        localNumber = +localStorage.getItem("ArgenNumber")
        if (localNumber == 5) localNumber = 1;
        else localNumber++
        localStorage.setItem("ArgenNumber",localNumber)
    }
    let clockWatch = document.querySelector(".clockWatch");

    let date = new Date()
    let dy = date.getFullYear();
    let dm = date.getMonth()+1;
    let dd = date.getDate();
    let th = Math.floor(date.getHours());
            // if (!th) th = 1
    let tm = date.getMinutes();
    let ts = date.getSeconds();
    let r3;
    if (dm == 1) r3 = w[11]*dy+Math.floor(dy/4)+dd
    else r3 = w[11]*dy+Math.floor(dy/4)+ w[dm-2]+ dd
    if (dy % 4 == 0 && dm < 3 && dd < 29) r3--;
    let timer,saat = 0, minut = 0, secund,lim2,times = 1000, nIntervId;
    nIntervId = setInterval(() => {

let date = new Date()
            let ddy = date.getFullYear();
            let ddm = date.getMonth()+1;
            let ddd = date.getDate();
            let tth = Math.floor(date.getHours());
            // if (!th) th = 1
            let ttm = date.getMinutes();
            let tts = date.getSeconds();
            let r2
            if (ddm == 1) r2 = w[11]*ddy+Math.floor(ddy/4)+ddd
            else r2 = w[11]*ddy+Math.floor(ddy/4)+ w[ddm-2]+ ddd
            if (ddy % 4 == 0 && ddm < 3 && ddd < 29) r2--;
                let r4 = r3
                r3 = r3 - r2 
                if (r < 0) {
                    tth += (r2-r4)*24 
                    r3 = 0
                }
                let qh = th
                qh += r3 * 24
                ttm += tth * 60
                let qm = tm + qh * 60
                tts += ttm * 60 
                let qs = ts + qm * 60 
                lim2 = qs + lim - tts
                if (lim2 < 0) lim2 = 0;
                // alert(lim2)
                r3 = r4
        if (lim2 <= 0) {
            // document.querySelector(".sum").click()
            variant(0,-1,0,0,0)
            clearInterval(nIntervId);
        }
        saat = Math.floor(lim2/3600);
        lim2 %= 3600;
        minut = Math.floor(lim2/60);
        lim2 %= 60
        clockWatch.innerHTML = (saat < 10?`0${saat}`:saat)+":"+(minut < 10?`0${minut}`:minut)+":"+(lim2 < 10?`0${lim2}`:lim2)
        // times = 10000
        // alert(lim)
    }, times);
// console.log(window.location['/'])

</script>
</body>
</html>