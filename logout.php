<?php 
session_start();
session_destroy();

header("HTTP/1.1 301 Moved Permanently");
header("Location: http://localhost/proj-blue/index.php");
// header("Location: http://d-lab.in/proj-blue/index.php");
 ?>