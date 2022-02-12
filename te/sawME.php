    <?php
    include("./myPage/php/connect.php");
    $id = $_POST["x"];
            $r2 = $conn->query("SELECT * FROM kursVideo WHERE id = '$id'");
            if (mysqli_num_rows($r2)) {
              $row = mysqli_fetch_array($r2);
              do {
                  $tap = '';
                  $test = '';
                  if ($row["file"] != '') $tap = '<a href="'.$row["file"].'"class="btn fas fa-pen"> Тапшырма</a>';
                  if ($row["test"] != '') $test = '<form action="test.php" method="post">
                    <input type="hidden" value="'.$row["test"].'" name="test">
                    <input type="hidden" value="'.$row["ids"].'" name="type">
                    <input type="submit" value="" style="opacity:0;" id="submit"><label for="submit" class="btn fas fa-check"> Тест</label></form>';
                echo '
                   <h1 style="text-align:center">Тема: '.$row["theme"].'</h1>
                   <hr>
                   <br>
                    <p style="text-align:center"><iframe  src="'.$row["video"].'" title="Nash kurs site" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen height="400" style="min-width:60%; max-width:95%;"></iframe></p>
                    <br>
					<div class="btns">
                    '.$tap.'
                    '.$test.'
					</div>
                    <br>
                    <br>
                    <hr>
                ';
              } while($row = mysqli_fetch_array($r2));
            }
    ?>