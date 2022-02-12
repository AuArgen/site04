<?php
include('./connect.php');
$id = $_POST["id"];
 $r = $conn -> query("SELECT * FROM kursELP WHERE id = '$id'");
    $n = mysqli_num_rows($r);
    if ($n) {
        echo '
        <tr>
            <th class="text-center">№</th>
            <th class="text-center">Аты жону</th>
            <th class="text-center">Мекемеси</th>
            <th class="text-center">Шанс</th>
        </r>
        ';
        $row = mysqli_fetch_array($r);
        do {
            echo '
                <tr>
                    <td class="ids">'.$id.'</td>
                    <td class="text-left">'.$row["fname"].' '.$row["sname"].'</td>
                    <td class="text-center">'.$row["org"].'</td>
                    <td class="text-center"><input class="hodinput" type="number" value="'.$row["hod"].'" placeholder="0"></td>
                    <td class="text-center btn btn-warning" onclick="saktoo()">Сактоо</td>
                </tr>
            ';
        } while($row = mysqli_fetch_array($r));
    }
?>