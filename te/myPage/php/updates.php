<?php
  include("./connect.php");
  $ty = $_POST["submit4"];
  if ($ty == 246) {
    $id = $_POST["id"];
    $hod = $_POST["hod"];
    $conn -> query ("UPDATE kursELP SET hod = '$hod'  WHERE id = $id");
    var_dump($id,$hod);
  }
  if ($ty == 245) {
    $w = $_POST["w"];
    $b = $_POST["b"];
    $theme = $_POST["theme"];
    $datetime = $_POST["datetime"];
    $conn -> query("DELETE FROM kursTest");
    $conn -> query("INSERT INTO kursTest (theme,datatime,people,kuntun,buy) VALUES('$theme','$datetime','0','$w','$b');");
    $r = $conn->query("SELECT * FROM kursTest");
    $n = mysqli_num_rows($r);
    if ($n) {
        $row = mysqli_fetch_array($r);
        do {
            $ids = $row["id"];
            $conn -> query ("UPDATE kursTestVar SET ids = '$ids'");
        } while ($row = mysqli_fetch_array($r));
    }
  } else {
   // math
        $theme = $_POST["theme"];
        $text = $_POST["text"];
        $video = $_POST["you"];
        $in = 0;
        $ni = 0;
        if ("https://youtu.be/" == substr($video,0,17) || "https://www.youtube.com/" == substr($video,0,24)) {
            $if = $_POST["you"];
            if (strlen($if) > 15) for ($i = 0; $i < strlen($if)-5; $i++) {
                if ($if[$i] == "e" && $if[$i+1] == "m" && $if[$i+2] == "b" && $if[$i+3] == "e" && $if[$i+4] == "d") $ni = 1;
            }
            if ($if && !$ni) {
				$vi = $video;
                $video = "https://www.youtube.com/embed/";
                if ("https://youtu.be/" == substr($vi,0,17))$video = $video.''.substr($if,17,strlen($if));
                else $video = $video.''.substr($if,32,strlen($if));
            }
        }
        $conn->query("UPDATE kursKursy SET theme = '$theme', text = '$text', video = '$video' WHERE type = '$ty'");
        // reload("./math.php");
        // $t = image();
    }
?>