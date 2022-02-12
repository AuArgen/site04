<?php
  
    if (isset($_POST["submit"])) {
        $theme = $_POST["theme"];
        $text = $_POST["text"];
        $image = $_POST["h0"];
        if ($_FILES["image"]["name"] != '') {
            unlink("../.$image");
            $image = image();        
        }
        $conn->query("UPDATE kursHome SET theme = '$theme', text = '$text', image = '$image' WHERE id = '$id'");
        reload("../");
    }
    //Biz
    if (isset($_POST["submit3"])) {
        $theme = $_POST["theme"];
        $text = $_POST["text"];
        $tel = $_POST["tel"];
        $whatsapp = $_POST["whatsapp"];
        $email = $_POST["email"];
        $image = $_POST["h0"];
        if ($_FILES["image"]["name"] != '') {
            unlink("../.$image");
            $image = image();        
        }
        $conn->query("UPDATE kursWe SET aty = '$theme', text = '$text', image = '$image',tel = '$tel', whatsapp = '$whatsapp', email = '$email' WHERE id = '$id'");
        reload("../about.php");
    }
    if(isset($_POST["submit4"])) {
        // echo'<script>alert("YEss")</script>';
        $theme = $_POST["theme"];
        $test = $_POST["test"];
        $file = fileUp();
        $video = $_POST["video"];
        $youTube = $_POST["youTube"];
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
                else $video = $video.''.substr($if,32,strlen($if));
            }
            else $video = $if;
            $youTube = "1";
        } else $youTube = "";
        $conn -> query("UPDATE kursVideo SET theme= '$theme', test = '$test', file='$file', video='$video', youTube='$youTube' WHERE id = '$id'");
        $ids = $_GET["ids"];
        $type = $_GET["type"];
        reload("../lessons.php?id=$ids&type=$type");
    }
    if (isset($_POST["submit5"])) {
        $theme = $_POST["theme"];
        $conn -> query("UPDATE kursThemeLessons SET aty= '$theme' WHERE id = '$id'");
        if ($type == '1')reload("../math.php");
        if ($type == '2')reload("../k-til.php");
    }
    function image() {
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
        $file2 = $_POST["h3"];
        if ($_FILES["doc"]["name"] != '') {
            $test = explode(".",$_FILES["doc"]["name"]);
            $e = end($test);
            $name = "FILE-".date("Y-m-d-H-i-s").''.rand(1,1000).'k.'.$e;
            $l = '../../file/'.$name;
            if (move_uploaded_file($_FILES["doc"]["tmp_name"],$l))
            {
                $l = './file/'.$name;
                return $l;
            }
            unlink("../.$file2");
        } else {
            return $file2;
        }
    }
    function videoUp() {
        $video2 = $_POST["h4"];
        if ($_FILES["video"]["name"] != '') {
            $test = explode(".",$_FILES["video"]["name"]);
            $e = end($test);
            $name = "VIDEO-".date("Y-m-d-H-i-s").''.rand(1,1000).'k.'.$e;
            $l = '../../video/'.$name;
            if (move_uploaded_file($_FILES["video"]["tmp_name"],$l))
            {
                $l = './video/'.$name;
                return $l;
            }
            unlink("../.$video2");
        } else {
            return $video2;
        }
    }

    function reload($link) {
        echo'
        <script>
                        function Load() {
                            window.location.replace("'.$link.'");
                        }
                        setTimeout(Load,10);
                    </script>
        ';
    }
?>