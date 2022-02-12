<?php
	$conn = new mysqli("localhost", "root","","kursbir");
	if ($conn -> connect_errno) {
		die("Error !!! ".$conn -> connect_errno);
        $conn -> close();
}
$conn->query ("set_client = 'utf8'");
$conn->query ("set character_set_results='utf8'");
$conn->query ("set collation_connection = 'utf8_general_ci'");
$conn->query ("SET NAMES utf8");
?>

