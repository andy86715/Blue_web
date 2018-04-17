<?php
session_start();
$acc = $_POST['account'];
$pass = $_POST['password'];

if ($acc == "1234" && $pass == "5678") {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://localhost/proj-blue/index_1.php");
	// header("Location: http://d-lab.in/proj-blue/index_1.php");
	
}
elseif ($acc == "5678" && $pass == "1234") {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://localhost/proj-blue/index_2.php");
	// header("Location: http://d-lab.in/proj-blue/index_2.php");
}
elseif ($acc == "nancy" && $pass == "nancy") {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://localhost/proj-blue/index_3.php");
	// header("Location: http://d-lab.in/proj-blue/index_3.php");
}
elseif ($acc == "user4" && $pass == "user4user4") {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://localhost/proj-blue/index_4.php");
	// header("Location: http://d-lab.in/proj-blue/index_4.php");
}
?>