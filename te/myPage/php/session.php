<?php
    $x = $_POST["x"];
	session_start();
    if ($x == 1) {
        unset($_SESSION["log"]);
        unset($_SESSION["pass"]);
        unset($_SESSION["email"]);
    }
	if($x == 2){
        unset($_SESSION["log"]);
        unset($_SESSION["pass"]);
	}
?>