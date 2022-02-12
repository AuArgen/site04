 <?php
    session_start();
    $log = $_SESSION["log"];
    $pass = $_SESSION["pass"];
    $fname;
    $sname;
    $geo;
    $org;
    include("./myPage/php/connect.php");
    $r = $conn -> query("SELECT * FROM kursELP WHERE login = '$log' and password = '$pass'");
        if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            do {
                $fname = $row["fname"];
                $sname = $row["sname"];
                $geo = $row["geo"];
                $org = $row["org"];  
            } while ($row = mysqli_fetch_array($r));
        }
function str_split_unicode($str, $l = 0) {
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }
        return $ret;
    }
    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}
    $answe = str_split_unicode($_POST["answe"],1);
    $value = $_POST["value"];
    $testid = $_POST["testid"];
    $testindex = $_POST["testindex"];
    $testLast = $_POST["testLast"];
    // var_dump($answe);
    // var_dump($answe[1]);
    $re = array();
    for ($i=0; $i < 66; $i++) { 
        if ($answe[$i] and $answe[$i] != ',') $re[] =$answe[$i];
    }
    $jop = array();
        $r = $conn -> query("SELECT * FROM kursTestImg WHERE ids = '$value'");
        $re2 = array();
        if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            do {
                if ($row["ot"] != 0)
                $re2[] = $row["id"];
            } while ($row = mysqli_fetch_array($r));
        }
        $bal = 0;
        $count = array();
        foreach ($re2 as $value) {
            $r = $conn -> query("SELECT * FROM kursTestAnswer WHERE ids = '$value'");
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                do {
                    $jop[] = $row["jop"];
                    $count[] = $row["bal"];
                    // if ($re[$count] == $jop[$count]) $bal += $row["bal"];
                    // echo $re[$count].' -> '.$jop[$count] .' = '.$row["bal"];
                } while ($row = mysqli_fetch_array($r));
            }  
        }
        // var_dump( $re);
        // var_dump( $jop);
        // var_dump($count);
    for ($i=0; $i < sizeof($count); $i++) { 
        $a = $re[$i];
        $b = $jop[$i];
        if ( $a==$b ) {
            $bal += $count[$i];
            // echo $count[$i].'\n'.$b;
            // echo $bal.'\n'.$a;
        }
    }
    if ($testid == $testLast){
        $r = $conn -> query("SELECT * FROM kursReiting WHERE login = '$log' and password = '$pass'");
        $chet = 0;
        if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                do {
                    $chet = $row["kol"];
                } while ($row = mysqli_fetch_array($r));            
        }
        $bal += $chet;
        $testindex += 1;
        $conn -> query ("UPDATE kursReiting SET kol = '$bal', ids = '$testid' WHERE login = '$log' and password = '$pass'");
        $conn -> query ("UPDATE kursELP SET testIndex = '$testindex', testLast = '$testid' WHERE login = '$log' and password = '$pass'");
    } else {
        $hod = 0;
        $r = $conn -> query("SELECT * FROM kursELP WHERE login = '$log' and password = '$pass'");
        if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            do {
                $hod = $row["hod"];
            } while ($row = mysqli_fetch_array($r));
        }
        $hod = $hod+0;
        $hod--;
        $r = $conn -> query("SELECT * FROM kursReiting WHERE login = '$log' and password = '$pass'");
        if (mysqli_num_rows($r)) {
            $conn -> query ("UPDATE kursReiting SET kol = '$bal', ids = '$testid' WHERE login = '$log' and password = '$pass'");
        } else {
            $conn -> query ("INSERT INTO kursReiting (kol,ids,sname,fname,geo,org,login,password,data) VALUES('$bal','$testid','$sname','$fname','$geo','$org','$log','$pass','01,01,02')");
        }
        $conn -> query ("UPDATE kursELP SET testIndex = '2',hod='$hod', testLast = '$testid' WHERE login = '$log' and password = '$pass'");
    }
?>
    