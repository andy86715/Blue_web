<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
// $dbpass = '=gjfUp6?';
$dbname = 'proj_blue';
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error with MySQL connection');
$seldb=mysqli_select_db($con,"proj_blue") or die("DB connection failed!");
mysqli_query($con,"SET NAMES 'UTF8'");

?>