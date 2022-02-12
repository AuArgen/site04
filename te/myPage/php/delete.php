<?php
    include("./connect.php");
    $x = $_POST["x"];
    $y = $_POST["y"];
    if ($y == 0) {
        $z = $_POST["z"];
        $conn -> query("DELETE FROM kursHome  WHERE id = '$x'");
        unlink("../.$z");
    }
    if ($y == 1) {
        $z = $_POST["z"];
        $conn -> query("DELETE FROM kursWe  WHERE id = '$x'");
        unlink("../.$z");
    }
    if ($y == 2) {
        $r = $conn -> query("SELECT * FROM kursVideo WHERE id = '$x'");
        $z;$h;
        if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            do {
                $z = $row["video"];
                $h = $row["file"];
            } while ($row = mysqli_fetch_array($r));
        }
        $conn -> query("DELETE FROM kursVideo  WHERE id = '$x'");
        unlink("../.$z");
        unlink("../.$h");
    }
    if ($y == 3) {
        $conn -> query("DELETE FROM kursThemeLessons  WHERE id = '$x'");
        $conn -> query("DELETE FROM kursVideo  WHERE ids = '$x'");
    }
    if ($y == 4) {
        $conn -> query("DELETE FROM kursTestVar  WHERE id = '$x'");
        $conn -> query("DELETE FROM kursTestImg  WHERE ids = '$x'");
    }
    if ($y == 5) {
        $r = $conn -> query("SELECT * FROM kursTestImg WHERE id = '$x'");
        $z;
        if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            do {
                $z = $row["image"];
            } while ($row = mysqli_fetch_array($r));
        }
        $conn -> query("DELETE FROM kursTestImg  WHERE id = '$x'");
        unlink("../.$z");
    }
?>