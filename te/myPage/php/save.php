<?php 
    if(isset($_POST["submit"])) {
        $text = $_POST["text"];
        $theme = $_POST["theme"];
        $file = image();
        $conn -> query("INSERT INTO kursHome (theme,text,image,type) VALUES('$theme','$text','$file','1');");
        reload();
    }
    if(isset($_POST["submit2"])) {
        $text = $_POST["text"];
        $theme = $_POST["theme"];
        $file = image();
        $conn -> query("INSERT INTO kursHome (theme,text,image,type) VALUES('$theme','$text','$file','2');");
        reload();
    }

    // We
    
    if(isset($_POST["submit3"])) {
        // echo'<script>alert("YEss")</script>';
        $text = $_POST["text"];
        $theme = $_POST["theme"];
        $tel = $_POST["tel"];
        $whatsapp = $_POST["whatsapp"];
        $email = $_POST["email"];
        $file = image();
        $conn -> query("INSERT INTO kursWe (aty,text,image,tel,email,whatsapp) VALUES('$theme','$text','$file','$tel','$email','$whatsapp');");
        reload();
    }
    if(isset($_POST["submit4"])) {
        // echo'<script>alert("YEss")</script>';
        $theme = $_POST["theme"];
        $test = $_POST["test"];
        $file = fileUp();
        $video = $_POST["video"];
        // echo"<script>alert('$video')</script>";
        $youTube = "";
        $in = 0;
        $ni = 0;
        if ("https://youtu.be/" == substr($video,0,17) || "https://www.youtube.com/" == substr($video,0,24)) {
            $if = $_POST["video"];
            if (strlen($if) > 15) for ($i = 0; $i < strlen($if)-5; $i++) {
                if ($if[$i] == "e" && $if[$i+1] == "m" && $if[$i+2] == "b" && $if[$i+3] == "e" && $if[$i+4] == "d") $ni = 1;
            }
            if ($if && !$ni) {
				$vi = $video;
                $video = "https://www.youtube.com/embed/";
                if ("https://youtu.be/" == substr($vi,0,17))$video = $video.''.substr($if,17,strlen($if));
                else $video = $video.''.substr($if,24,strlen($if));
            }
            else $video = $if;
            $youTube = "1";
        }
        $conn -> query("INSERT INTO kursVideo (theme,test,file,video,ids,type,youTube) VALUES('$theme','$test','$file','$video','$id','$type','$youTube');");
        reload();
    }
    if(isset($_POST["submit5"])) {
        // echo'<script>alert("YEss")</script>';
        $theme = $_POST["theme"];
        $test = $_POST["test"];
        $file = fileUp();
        $video = $_POST["video"];
        // echo"<script>alert('$video')</script>";
        $youTube = "";
        $in = 0;
        $ni = 0;
        if ("https://youtu.be/" == substr($video,0,17) || "https://www.youtube.com/" == substr($video,0,24)) {
            $if = $_POST["video"];
            if (strlen($if) > 15) for ($i = 0; $i < strlen($if)-5; $i++) {
                if ($if[$i] == "e" && $if[$i+1] == "m" && $if[$i+2] == "b" && $if[$i+3] == "e" && $if[$i+4] == "d") $ni = 1;
            }
            if ($if && !$ni) {
				$vi = $video;
                $video = "https://www.youtube.com/embed/";
                if ("https://youtu.be/" == substr($vi,0,17))$video = $video.''.substr($if,17,strlen($if));
                else $video = $video.''.substr($if,24,strlen($if));
            }
            else $video = $if;
            $youTube = "1";
        }
        $conn -> query("INSERT INTO kursVideo (theme,test,file,video,type,youTube) VALUES('$theme','$test','$file','$video','2','$youTube');");
        reload();
    }
    if(isset($_POST["submit6"])) {
        $theme = $_POST["theme"];
        $conn -> query("INSERT INTO kursThemeLessons (aty,type) VALUES('$theme','$type');");
        reload();
    }
    if(isset($_POST["submit7"])) {
        $img = image();
        $ot = $_POST["num1"];
        $do = $_POST["num2"];
        $conn -> query("INSERT INTO kursTestImg (ids,type,image,ot,do) VALUES('$id','$type','$img','$ot','$do');");
        $r = $conn -> query ("SELECT * FROM kursTestImg ORDER BY id DESC");
        $ids;
        if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            do {
                $ids = $row["id"];
                break;
            } while($row = mysqli_fetch_array($r));
        }
        for ($i = $ot; $i <= $do; $i++) { 
            $conn -> query("INSERT INTO kursTestAnswer (ids,bal,jop) VALUES('$ids','','');");
        }
        reload();
    }
    if(isset($_POST["submit7_2"])) {
        $img = $_POST["image2"];
        if ($_FILES["image"]["name"] != '') {
            if ($img != "")
            unlink("../.$img");
            $img = image2();
        }
        $ot = $_POST["num1"];
        $do = $_POST["num2"];
        $id = $_GET["id"];
        $ids = $id;
        $conn -> query("UPDATE kursTestImg SET ot = '$ot', do = '$do', image = '$img' WHERE id = $id ");
        $r = $conn -> query ("SELECT * FROM kursTestImg");
        for ($i = $ot; $i <= $do; $i++) { 
            $bal = $_POST["bal$i"];
            $jop = $_POST["jop$i"];
            $id = $_POST["id$i"];
            $conn -> query("UPDATE kursTestAnswer SET bal = '$bal', jop = '$jop' WHERE id = $id ");
        }
        $conn -> query("DELETE FROM kursTestAnswer WHERE ids = '$ids' and id > $id");
        $type = $_GET["type"];
        $ids = $_GET["ids"];
          echo"
        <script>
                        function Load() {
                            window.location.replace('../jrtimg.php?id=$ids&type=$type');
                        }
                        setTimeout(Load,10);
                    </script>
        ";
    }
    function image() {
        if ($_FILES["image"]["name"] != '') {
            $test = explode(".",$_FILES["image"]["name"]);
            $e = end($test);
            $name = "IMG-".date("Y-m-d-H-i-s").''.rand(1,1000).'k.'.$e;
            $l = '../img/'.$name;
            if (move_uploaded_file($_FILES["image"]["tmp_name"],$l))
            {
                $l = './img/'.$name;
                return $l;
            }
        }
    }
    function image2() {
        if ($_FILES["image"]["name"] != '') {
            $test = explode(".",$_FILES["image"]["name"]);
            $e = end($test);
            $name = "IMG-".date("Y-m-d-H-i-s").''.rand(1,1000).'k.'.$e;
            $l = '../../img/'.$name;
            if (move_uploaded_file($_FILES["image"]["tmp_name"],$l))
            {
                $l = './img/'.$name;
                return $l;
            }
        }
    }
    function fileUp() {
        if ($_FILES["doc"]["name"] != '') {
            $test = explode(".",$_FILES["doc"]["name"]);
            $e = end($test);
            $name = "FILE-".date("Y-m-d-H-i-s").''.rand(1,1000).'k.'.$e;
            $l = '../file/'.$name;
            if (move_uploaded_file($_FILES["doc"]["tmp_name"],$l))
            {
                $l = './file/'.$name;
                return $l;
            }
        }
    }
    function videoUp() {
        if ($_FILES["video"]["name"] != '') {
            $test = explode(".",$_FILES["video"]["name"]);
            $e = end($test);
            $name = "VIDEO-".date("Y-m-d-H-i-s").''.rand(1,1000).'k.'.$e;
            $l = '../video/'.$name;
            if (move_uploaded_file($_FILES["video"]["tmp_name"],$l))
            {
                $l = './video/'.$name;
                return $l;
            }
        }
    }
    function reload() {
        echo'
        <script>
                        function Load() {
                            window.location.replace("");
                        }
                        setTimeout(Load,10);
                    </script>
        ';
    }
?>