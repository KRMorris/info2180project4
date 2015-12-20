<?php
$hostname = "localhost";
$user = "root";
$password = "info2180";
$database = "cheapo";
$bd = mysql_connect($hostname, $user, $password) or die("Could not connect database");
mysql_select_db($database, $bd) or die("Could not select database");
?>
