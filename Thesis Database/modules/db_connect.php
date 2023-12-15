<?php
$username = "root";
$password = "";
$server   = "localhost";
$dbasename = "thesis_db";

$connector = mysqli_connect($server, $username, $password);
mysqli_select_db($connector, $dbasename);
?>